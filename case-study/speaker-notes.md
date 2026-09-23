# Speaker notes — How to Run a Prototype-First Build

**Companion to:** `case-study/gerotech-process-playbook.html`
**Audience:** CloudMellow leadership
**Format:** nine-step how-to, taught from the Gerotech website redesign
**Runtime:** ~18 minutes at roughly a minute per slide, plus questions

---

## How to run the deck

- Open `case-study/gerotech-process-playbook.html` in a browser. No server needed — the screenshots sit in `case-study/images/`.
- **← / →** (or click Prev/Next, or swipe) to navigate. **N** toggles speaker notes. **P** prints — use "Save as PDF" for a handout; each slide lands on its own landscape page.
- Deep-link any slide with `#slide-7` in the address bar.
- Every screenshot in the deck is real: the prototype, the live WordPress site, the client's admin, the design file's actual comments, and genuine audit output.

## The one thing to land

> The prototype wasn't a deliverable. It was **schedule insurance that became the specification**.

Say that in the first two minutes and again at step 5 (slide 8). Everything else supports it.

## Tone rules

- Talk in **outcomes and decisions**, not technology. The deck deliberately avoids tool vocabulary.
- Every step ends with **"how you know it worked"** — use that line out loud. It's what turns a story into a method.
- Don't oversell. Slide 2 states plainly when *not* to use the method; that's what makes it credible.

---

## Slide-by-slide

### 01 · Title
Open by naming the format: this is a **how-to in nine steps**, and Gerotech is the worked example. Point at the nine-word strip along the bottom — that's the whole method.
*Ask we're building toward:* agreement to run the next project this way.

### 02 · The method at a glance
Walk the nine steps at one line each. Do **not** go into detail — this is the map.
Then read the "use it when" line deliberately, including the *skip it when* half. It's the decision rule, and it's what stops this sounding like a boast.

### 03 · Step 1 — Start the working draft
The core move: **when the gate is closed, build the thing behind it.**
Nine days from first line to client-ready. Be explicit that placeholders are a *feature* — they make outstanding decisions visible instead of burying them in assumptions.
*Proof line:* the client reviews a page, not a picture.

### 04 · Step 1 continued — Go wide
The commercial point: this is why page 12 is cheap. New pages are **variations, not new decisions**.
The strip of thumbnails is breadth; the mobile shot is there because responsive isn't a later phase.

### 05 · Step 2 — Lock the style guide *(figure slide)*
**Decide the rules once.** Point at the colour swatches — that file is why the design survived three months of changes and twelve pages.
Avoid systems vocabulary out loud. Say "we decided the rules once."

### 06 · Step 3 — One feedback channel *(figure slide)*
The pins are **real client comments** from the design file, and the quotes beside them are verbatim. Each one became a task with an owner and got closed.
The benefit to state plainly: a long review cycle never turns into an argument about what was agreed.

### 07 · Step 4 — Write the shared brief *(figure slide)*
Demystify immediately: **three ordinary documents**, not software.
- Instructions — how we work
- Current status — what's true right now
- Project diary — what happened and why
Then the line that matters: continuity is a **process choice**, not a technology feature. It's also what let multiple AI assistants work on one project without losing state.

### 08 · Step 5 — Carry the design across *(figure slide — the key slide)*
**Slow down.** Left is the approved draft; right is the same page built in WordPress. They are near-identical, and that is the whole argument.
Say it: *"When the draft is the specification, approval and build can't drift apart."*
If you only get one slide to land, make it this one.

### 09 · Step 6 — Cost the build path
This slide protects the team. Route A was genuinely costed at **46–70 developer days** and rejected on evidence, not preference. Route B was six days.
Keep the tooling out of the discussion — leadership needs the reasoning and the number.

### 10 · Step 7 — Build from the draft
Six days, because the design was already a working reference: the build was **translation, not invention**.
The two thumbnails at the bottom are the comparison. If someone asks how you know the build matched, point there.

### 11 · Step 8 — Hand over the controls *(figure slide)*
The client edits their own content without calling us. Two habits make it usable:
1. Labels written in plain language ("Join our mailing list" — not a field name).
2. The safe default stated inside the field.
And the discipline: if a decision is still owed, **leave the field empty rather than guessing**.

### 12 · Step 9 — Verify automatically *(figure slide)*
This is the rule that prevents the worst failure. **A control can render the design perfectly while being empty in the admin.** Nothing looks broken — which is exactly why it gets missed.
The terminal shows genuine output: 279 of 291 controls applied. The other 12 are correct by design — a blank colour choice means "keep the design colour".

### 13 · The checklist
**The slide to keep.** Everything before it is justification; everything after is next steps.
Read the nine items aloud, slowly. This is what someone should be able to pick up cold.

### 14 · Watch out for these
Priority key: **1** could have blocked the client from editing or damaged the approved design; **3** was friction. Every row leads with the fix and shows a status.
The two "silent" roadblocks are the most instructive — they looked fine on screen. That pair is the reason step 9 exists.

### 15 · What it produced
Frame every number as a **consequence of the method**, not a separate achievement:
- 9 days to a presentable draft
- 12 pages designed
- 291 controls the client owns (so they don't call us)
- 14 pages live and verified
The two closing columns — "what made it fast" and "what made it safe" — are the summary. Preparation and checks.

### 16 · Next steps — close on an ask
Two decisions:
1. **Adopt the method** — the nine steps as the default on the next design-to-build project.
2. **Fund the verification step** — so a control can never ship empty behind a site that looks correct.
Keep the "still open" line brief: enough to show nothing is hidden, without turning the close into a risk review.

---

## Likely questions

**"Couldn't the client see the editing controls were broken?"**
No — that's what made it dangerous. The site rendered correctly; only the editing controls were empty. That's why we verify automatically rather than by eye.

**"Did using AI mean less oversight?"**
The opposite. People set direction and approved every change. The work was faster because the brief was written down, not because review was lighter.

**"What did the prototype cost us?"**
Nine days to the first draft. It paid for itself twice: it unblocked the design phase while approval was pending, and it removed the ambiguity from the build.

**"Would this work on a smaller project?"**
Yes — the three shared-brief documents scale down to a paragraph each. The test is simple: if more than one session will touch the work, write the brief down.

**"What if the client changes their mind after approval?"**
That's what the style guide is for. Rules decided once mean a change is a variation, not a rebuild — and the comparison against the draft shows exactly what moved.

**"Why not just use a page builder?"**
We costed it: 46–70 developer days, plus lock-in. The design system couldn't be reproduced from stock builder components anyway, so the design would have been compromised to fit the tool.

---

## Words to avoid out loud

Repository, commit, deploy, sync, tokens, CSS, ACF, field, environment, staging, checksum, component library, pipeline, prototype framework.

Say instead: the project files, saved, published, kept in step, shared style guide, styling, editing controls, control, the test site, file-by-file comparison, building blocks, the working draft.
