#!/usr/bin/env bash
#
# design-stack.sh — design-revision agent stack for THIS repo:
#   opencode + Web Lens + Playwright MCP + Continue tab autocomplete
#
# Repo-aware variant of ~/Desktop/design-stack.sh. Two deliberate differences:
#
#   1. This project is a zero-build static prototype served on :8080
#      (VS Code task "Serve Gerotech (8080)" / python3 -m http.server 8080) —
#      NOT a Vite/Next app on :3000. `.vscode/settings.json` therefore overrides
#      `webLens.defaultUrl` to http://localhost:8080, and `check` verifies the
#      URL actually in effect instead of assuming 3000.
#   2. Upstream's `$0 usage >/dev/null` self-exec is dropped. It re-ran this whole
#      script as a child process only to discard the usage text, and errored with
#      "usage: No such file or directory" when the script was piped into bash
#      (where $0 is not a path).
#
# Usage:
#   ./scripts/design-stack.sh           print this cheat-sheet
#   ./scripts/design-stack.sh check     verify the whole stack + this repo's server
#   ./scripts/design-stack.sh serve     start the static prototype on :8080
#   ./scripts/design-stack.sh start     ensure Ollama is serving
#
# ASCII + bash 3.2 safe (stock macOS bash): no mapfile, no declare -A, no ${var,,}.

set -uo pipefail

OK="\033[1;32m"; WARN="\033[1;33m"; ERR="\033[1;31m"; INFO="\033[1;36m"; RST="\033[0m"
FAILED=0
pass(){ printf "${OK}  ok${RST}  %s\n" "$1"; }
warn(){ printf "${WARN}  ?!${RST}  %s\n" "$1"; }
fail(){ FAILED=$((FAILED + 1)); printf "${ERR}  no${RST}  %s\n" "$1"; }

SELF_PATH="${BASH_SOURCE[0]:-}"
[ -f "$SELF_PATH" ] || SELF_PATH="$0"
if [ -f "$SELF_PATH" ]; then
  REPO_ROOT="$(cd "$(dirname "$SELF_PATH")/.." && pwd)"
  SELF="$(basename "$SELF_PATH")"
else
  # Piped into bash (`cat script | bash -s check`): BASH_SOURCE is unset under
  # `set -u` and $0 is "bash" — fall back to the current directory.
  REPO_ROOT="$(pwd)"
  SELF="$(basename "$0")"
  [ "$SELF" = "bash" ] || [ "$SELF" = "sh" ] && SELF="design-stack.sh"
fi
PROG="./scripts/$SELF"

WS_SETTINGS="$REPO_ROOT/.vscode/settings.json"
WS_TASKS="$REPO_ROOT/.vscode/tasks.json"
GITIGNORE="$REPO_ROOT/.gitignore"
USER_SETTINGS="$HOME/Library/Application Support/Code/User/settings.json"
OPENCODE_CFG="$HOME/.config/opencode/opencode.jsonc"
REVISE_CMD="$HOME/.config/opencode/command/revise.md"
CONTINUE_CFG="$HOME/.continue/config.ts"
ZSHRC="$HOME/.zshrc"

OLLAMA_URL="http://127.0.0.1:11434"
PORT=8080
URL="http://localhost:$PORT"

cmd_in_path(){ command -v "$1" >/dev/null 2>&1; }
http_ok(){ curl -s -o /dev/null --max-time 2 "$1"; }
ext_installed(){ code --list-extensions 2>/dev/null | grep -qix "$1"; }

# json_str <file> <key> — first "key": "value" string in a JSON/JSONC file,
# ignoring // comment lines (settings.json is JSONC and its comments quote URLs).
json_str(){
  [ -f "$1" ] || return 0
  grep -v '^[[:space:]]*//' "$1" 2>/dev/null \
    | grep -o "\"$2\"[[:space:]]*:[[:space:]]*\"[^\"]*\"" \
    | head -1 | sed 's/^[^:]*:[[:space:]]*"//; s/"$//'
}

# port_of <url> — "http://localhost:8080" -> "8080" (empty if no explicit port)
port_of(){
  case "$1" in
    *:[0-9]*) printf '%s' "${1##*:}" | tr -cd '0-9' ;;
    *)        printf '' ;;
  esac
}

usage() {
cat <<EOF

DESIGN-REVISION STACK — how to use it (this repo)
================================================

OPENCODE (the agent) — inside VS Code
  Cmd+Esc          open/focus opencode in a split terminal
  Cmd+Shift+Esc    new opencode session (sends current selection)
  Cmd+Option+K     insert @file references, e.g. @index.html#L37-42

REVISE COMMAND (opencode)
  /revise <what to change>           start a design revision
  /revise make the button match the attached screenshot
  Attach @file element context and/or a Figma node/screenshot (Figma file
  YgHwqyyFj57c1ZSbmfkL0c). The agent:
     1. reads the reference       2. locates the component/CSS
     3. applies a minimal, style-consistent change
     4. verifies in the browser (Playwright) and iterates
  Prompt after every change:  verify the change in the browser

WEB LENS (click-to-highlight)
  1. Start the server:  $PROG serve
     (or Terminal -> Run Task -> "Serve Gerotech (8080)")  -> $URL
     Static files only — this prototype has no npm/build step.
  2. Cmd+Shift+P -> "Web Lens: Open"   (uses http://localhost:8080)
  3. "Web Lens: Inspect Element" -> click the rendered element(s)
  4. Each element's DOM/CSS/HTML lands in opencode chat as @file refs
  5. Type your revision note -> agent implements it
  Bonus: "Web Lens: Screenshot" annotates a page screenshot with arrows/callouts
  Context files land in $REPO_ROOT/.tmp (gitignored).

PLAYWRIGHT MCP (verify loop)
  After every revision, ask:  verify the change in the browser
  The agent opens the page, takes a screenshot, diffs it against your
  attached reference, and iterates until it matches. Uses its own Chromium.

CONTINUE (tab autocomplete — Ollama qwen3:4b, on by default)
  Tab             accept the suggestion
  Esc             reject it
  Cmd+Right       accept word-by-word
  Cmd+Alt+Space   force a suggestion now
  Toggle: click "Continue" in the VS Code status bar, or
          Cmd+Shift+P -> "Continue: Toggle Autocomplete"

KEEP THE STACK HEALTHY
  $PROG check    green = everything wired up
  $PROG start    (re)start Ollama on 127.0.0.1:11434
  $PROG serve    (re)start the prototype server on :8080
EOF
}


check() {
  echo
  echo "design-stack check — $REPO_ROOT"
  echo "---------------------------------------------"

  printf "\n${INFO}Core CLI${RST}\n"
  if cmd_in_path opencode; then pass "opencode $(opencode --version 2>/dev/null | head -1) on PATH"; else fail "opencode CLI missing"; fi
  if cmd_in_path code;    then pass "code CLI on PATH"; else fail "code CLI missing (VS Code -> Shell Command: Install 'code' command in PATH)"; fi

  printf "\n${INFO}VS Code extensions${RST}\n"
  if cmd_in_path code; then
    ext_installed "sst-dev.opencode"           && pass "opencode extension (Cmd+Esc / Cmd+Shift+Esc / Cmd+Option+K)" || fail "install: code --install-extension sst-dev.opencode"
    ext_installed "collectiveai-team.web-lens" && pass "Web Lens (click-to-highlight)"                                 || fail "install: code --install-extension collectiveai-team.web-lens"
    ext_installed "continue.continue"          && pass "Continue (tab autocomplete)"                                  || fail "install: code --install-extension continue.continue"
  else
    fail "code CLI unavailable — cannot list extensions"
  fi

  printf "\n${INFO}opencode config (global)${RST}\n"
  if [ -f "$OPENCODE_CFG" ]; then
    grep -q '"playwright"'  "$OPENCODE_CFG" && pass "Playwright MCP configured"      || fail "missing playwright mcp in opencode.jsonc"
    grep -q '"figma"'       "$OPENCODE_CFG" && pass "Figma MCP configured"           || fail "missing figma mcp in opencode.jsonc"
    grep -q 'playwright_\*' "$OPENCODE_CFG" && pass 'permission: playwright_* = ask' || fail "missing playwright_* permission"
  else
    fail "opencode.jsonc not found at $OPENCODE_CFG"
  fi
  if [ -f "$REVISE_CMD" ]; then pass "/revise command present"; else fail "missing global command revise.md"; fi

  printf "\n${INFO}Continue + Ollama (autocomplete)${RST}\n"
  if [ -f "$CONTINUE_CFG" ]; then
    grep -q 'qwen3:4b' "$CONTINUE_CFG" && pass "autocomplete model qwen3:4b (Ollama) in config.ts" || fail "missing ollama autocomplete model in config.ts"
  else
    fail "~/.continue/config.ts not found"
  fi
  if [ "${EDITOR:-}" = "code --wait" ] || grep -q 'EDITOR="code --wait"' "$ZSHRC" 2>/dev/null; then pass 'EDITOR="code --wait"'; else fail 'EDITOR not set in ~/.zshrc'; fi
  if grep -q '"continue.enableTabAutocomplete": true' "$USER_SETTINGS" 2>/dev/null; then pass "continue.enableTabAutocomplete = true"; else fail "tab autocomplete not enabled in user settings.json"; fi

  printf "\n${INFO}Web Lens settings${RST}\n"
  if grep -q '"webLens.backend": "opencode"' "$USER_SETTINGS" 2>/dev/null; then pass 'webLens.backend = opencode'; else fail 'webLens.backend not set in user settings.json'; fi
  # A workspace override wins over the user setting — verify the URL actually in effect.
  WS_URL="$(json_str "$WS_SETTINGS" "webLens.defaultUrl")"
  USER_URL="$(json_str "$USER_SETTINGS" "webLens.defaultUrl")"
  if [ -n "$WS_URL" ]; then
    if [ "$(port_of "$WS_URL")" = "$PORT" ]; then pass "webLens.defaultUrl (workspace) = $WS_URL"; else warn "webLens.defaultUrl (workspace) = $WS_URL but this repo serves $URL"; fi
  elif [ -n "$USER_URL" ]; then
    warn "webLens.defaultUrl falls back to the user setting ($USER_URL) — this repo serves $URL; add a workspace override"
  else
    fail "webLens.defaultUrl not set in workspace or user settings.json"
  fi
  CTX="$(json_str "$WS_SETTINGS" "webLens.contextDirectory")"
  [ -z "$CTX" ] && CTX="$(json_str "$USER_SETTINGS" "webLens.contextDirectory")"
  if [ -n "$CTX" ]; then
    grep -q "^${CTX}/" "$GITIGNORE" 2>/dev/null && pass "webLens.contextDirectory '$CTX/' is gitignored" || warn "webLens.contextDirectory '$CTX/' not in .gitignore"
  else
    warn "webLens.contextDirectory not set — Web Lens picks its own output folder"
  fi

  printf "\n${INFO}Prototype server (:${PORT})${RST}\n"
  if grep -q "$PORT" "$WS_TASKS" 2>/dev/null; then pass "VS Code task 'Serve Gerotech ($PORT)' present"; else fail ".vscode/tasks.json missing the :$PORT serve task"; fi
  if http_ok "$URL"; then pass "$URL responding"; else warn "$URL not serving — run: $PROG serve"; fi

  printf "\n${INFO}Ollama server${RST}\n"
  if curl -s --max-time 2 "$OLLAMA_URL/api/version" >/dev/null 2>&1; then
    pass "serving on 127.0.0.1:11434"
    curl -s --max-time 3 "$OLLAMA_URL/api/tags" 2>/dev/null | grep -q 'qwen3:4b' && pass "model qwen3:4b pulled" || warn "qwen3:4b not pulled — run: ollama pull qwen3:4b"
  else
    fail "Ollama not reachable — run: $PROG start"
  fi

  echo
  if [ "$FAILED" -eq 0 ]; then
    printf "${OK}  All checks passed.${RST}\n\n"
  else
    printf "${ERR}  %s check(s) failed.${RST}\n\n" "$FAILED"
  fi
  return "$FAILED"
}

serve() {
  if http_ok "$URL"; then
    printf "${OK}  Already serving at %s${RST}\n" "$URL"
    return 0
  fi
  if ! cmd_in_path python3; then
    printf "${ERR}  python3 not found — install Xcode Command Line Tools, or use the VS Code task${RST}\n"
    return 1
  fi
  printf "${INFO}  Starting python3 -m http.server %s in %s${RST}\n" "$PORT" "$REPO_ROOT"
  ( cd "$REPO_ROOT" && nohup python3 -m http.server "$PORT" >/dev/null 2>&1 & )
  for _ in $(seq 1 20); do
    if http_ok "$URL"; then
      printf "${OK}  Prototype is up at %s${RST}\n" "$URL"
      return 0
    fi
    sleep 1
  done
  printf "${ERR}  Nothing answered on %s within 20s.${RST}\n" "$PORT"
  printf "${INFO}  Port already taken?  lsof -i :%s  then kill the PID, and re-run.${RST}\n" "$PORT"
  return 1
}

start() {
  if curl -s --max-time 2 "$OLLAMA_URL/api/version" >/dev/null 2>&1; then
    printf "${OK}  Ollama already serving on 127.0.0.1:11434${RST}\n"
    return 0
  fi
  printf "${INFO}  Starting Ollama...${RST}\n"
  if [ -d "/Applications/Ollama.app" ]; then
    open -a Ollama
  elif cmd_in_path ollama; then
    nohup ollama serve >/dev/null 2>&1 &
  else
    printf "${ERR}  Ollama not installed — https://ollama.com/download${RST}\n"
    return 1
  fi
  for _ in $(seq 1 30); do
    if curl -s --max-time 1 "$OLLAMA_URL/api/version" >/dev/null 2>&1; then
      printf "${OK}  Ollama is up.${RST}\n"
      return 0
    fi
    sleep 1
  done
  printf "${ERR}  Ollama did not come up in 30s.${RST}\n"
  return 1
}

# `check` ensures Ollama (harmless, already-running is the common case) but never
# silently binds :8080 — starting a background web server stays an explicit `serve`.
case "${1:-usage}" in
  usage|help|-h|--help) usage ;;
  check)  start; check ;;
  serve)  serve ;;
  start)  start ;;
  *)      printf "${ERR}  unknown command: %s${RST}\n" "$1"; usage; exit 2 ;;
esac

