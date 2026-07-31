# Zed + Cline + Figma — smoke test

## Project
`gerotech-prototype` (static HTML/CSS/JS prototype)

## Figma wireframes
- File: `YgHwqyyFj57c1ZSbmfkL0c` (Gerotech-Design)
- Homepage: https://www.figma.com/design/YgHwqyyFj57c1ZSbmfkL0c/Gerotech-Design?node-id=6218-10
- Engineered Solutions: https://www.figma.com/design/YgHwqyyFj57c1ZSbmfkL0c/Gerotech-Design?node-id=6217-425

## Two Figma MCP paths

| Server | Auth | Works with Cline? | Use for |
|--------|------|-------------------|--------|
| **framelink-figma** (PAT) | Personal access token | ✅ Yes | Cline + Zed (recommended for Zed/Cline) |
| **figma** official remote | OAuth (catalog clients) | ❌ 403 on Cline | Cursor / Zed Agent after OAuth |

---

## One-time: save your Figma PAT

1. Open tokens page: https://www.figma.com/developers/api#access-tokens  
   (or run `figma-token-page`)
2. Create a token with at least **file content read** access.
3. In Terminal:

```bash
figma-pat-setup
# paste token when prompted (hidden)
```

Saves to `~/.config/figma/api_key` (chmod 600). Never commit this file.

Verify:

```bash
npx cline@3.0.48 config mcp
# expect: framelink-figma [stdio]
#         figma-official [streamableHttp] (disabled)

# API probe is inside figma-pat-setup; wrapper exists at:
which framelink-figma-mcp
```

---

## Smoke prompt (Cline in Zed)

Agent Panel → **Cline** → paste:

> Use the Framelink / figma MCP tools on  
> https://www.figma.com/design/YgHwqyyFj57c1ZSbmfkL0c/Gerotech-Design?node-id=6218-10  
> Return the frame name and top-level section structure only. Do not edit files.

CLI equivalent:

```bash
cd ~/Developer/gerotech-prototype
npx cline@3.0.48 -c . --auto-approve true \
  "Use Framelink Figma MCP on https://www.figma.com/design/YgHwqyyFj57c1ZSbmfkL0c/Gerotech-Design?node-id=6218-10 — report frame name + top-level sections only. No file edits."
```

---

## Config locations

| File | Purpose |
|------|---------|
| `~/.config/figma/api_key` | PAT (local only) |
| `~/.local/bin/framelink-figma-mcp` | stdio wrapper |
| `~/.local/bin/figma-pat-setup` | interactive token save |
| `~/.cline/data/settings/cline_mcp_settings.json` | Cline MCP list |
| `~/.config/zed/settings.json` | Zed agents + MCP |

---

## Troubleshooting

| Symptom | Fix |
|---------|-----|
| `no Figma PAT found` | Run `figma-pat-setup` |
| API 403 on `/v1/me` | Token expired or missing file access — recreate PAT |
| Cline still no Figma tools | Restart Cline hub: `npx cline hub restart` (or quit Zed/Cline and reopen) |
| Official `figma` OAuth 403 | Expected for Cline; use **framelink-figma** |
