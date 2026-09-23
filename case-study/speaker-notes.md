# Speaker notes — From Kickoff Call to Dev-Ready Build

**Companion to:** `case-study/gerotech-process-playbook.html`
**Audience:** CloudMellow leadership
**Format:** seven-phase process, taught from the Gerotech website redesign
**Runtime:** ~22 minutes at roughly a minute per slide, plus questions

---

## How to run the deck

- Open `gerotech-process-playbook.html` in a browser. No server needed — the screenshots sit in `images/`.
- **← / →** (or click Prev/Next, or swipe) to navigate. **N** toggles speaker notes. **P** prints — use "Save as PDF" for a handout; each slide lands on its own landscape page.
- Deep-link any slide with `#slide-7` in the address bar.
- Every visual is real: the wireframe and design file from Figma, the working prototype, the live WordPress site, the client's own admin, and genuine audit output.

## The one thing to land

> **Figma is the room.** Everything the client sees and discusses happens there. **Code is the engine** — it's how we make the design responsive, animated and real, and it becomes the build.

And the bridge that makes both work: the code prototype goes **back into Figma as artboards**, so the client always reviews in the room they know.

## The three sentences that carry the deck

1. **"Figma is the room. Code is how we make it, not where they review it."** (slide 3)
2. **"Code for the hard-to-judge parts, back into Figma for the conversation."** (slide 10)
3. **"We hand dev a designed front end that's ready for the complex functionality our clients need."** (slide 16)

## Tone rules

- The two tools are **not competitors**. If you catch yourself saying "we design in code instead of Figma", stop — that's the version we corrected.
- Talk in outcomes and decisions, never technology.
- Never say "zero licences". The precise claim is on slide 17 — use it exactly.
- Phases 1–3 are the ones teams skip. Say why skipping them makes phases 4–5 expensive.

---

## Slide-by-slide

### 01 · Title
Name the format: a **process in seven phases**, with Gerotech as the worked example. Read the seven-word strip along the bottom.

### 02 · The process at a glance
Walk the seven phases, one line each. Do not go into detail — this is the map. Then the "use it when" line: bespoke design, client needs to edit, project will grow.

### 03 · Figma is the room *(figure slide)*
**This slide sets up everything after it.** Wireframes, moodboards, designs and comments all live in Figma. That's where the client sees the work and where the conversation happens.
Say it plainly: *Figma is the room. Code is how we make it, not where they review it.*

### 04 · Phase 1 — Kickoff & discovery *(figure slide)*
We audit the live site before designing anything, so the redesign is grounded in facts.
The finding that shaped Gerotech: **the client could not edit their own content.** That became a hard requirement for the build. Note also that inventory content missing from the new structure was flagged for a client decision rather than silently dropped.

### 05 · Phase 2 — Sitemap *(figure slide)*
The structure is agreed before any design work, when changing it is free.
One decision here gets reused everywhere — navigation, mega-menu, mobile menu, breadcrumbs, search.

### 06 · Phase 3 — Wireframes *(figure slide)*
Structure before style. This is a **real wireframe** — grey boxes where photography goes, placeholder copy, declared image ratios. It goes into Figma, so the client reviews and comments there.
Every section here becomes a section in the built page, in the same order.

### 07 · Phase 4 — Design & iterate *(figure slide — the heart of the method)*
Moodboards and reference sites set the direction; the homepage is agreed; then every page is designed in a loop between Figma and code.
**Neither tool does the other's job:** Figma is where the design is presented and discussed; code is where responsive behaviour and motion are worked out. Because it runs both ways, neither copy drifts.

### 08 · What the code prototype adds
**Frame the prototype correctly** — it isn't a rival to Figma. It's how we settle the things Figma is bad at judging:
- Responsive ideas tested for real (breakpoints, stacking, type scaling)
- Animation concepts the client can actually watch
- Layout experiments in minutes
Also make the sequencing clear: **internal until design**, client-facing from the design phase onward.

### 09 · Every page, one system
The commercial point: new pages are **variations, not new decisions**. A shared style guide is what makes the tenth page as fast as the second.
Responsive is built as we go, not retrofitted at the end.

### 10 · HTML → Figma artboards *(figure slide)*
**The bridge that makes the two-tool approach work.** Work built in code goes back into Figma as editable artboards, so the client reviews it in the room they already use.
This is the piece people miss: it's not "design in Figma *or* code". It's code for the hard-to-judge parts, back into Figma for the conversation.
Tool: **html.to.design** — a Chrome extension plus a Figma plugin.

### 11 · Phase 5 — Review & approve *(figure slide)*
One feedback channel, in Figma. Notes attach to the exact spot, and each becomes a tracked item with an owner.
Real comments from the Gerotech file. The benefit: a long review cycle never turns into an argument about what was agreed.

### 12 · The style guide *(figure slide)*
**Runs across every phase.** Decide the rules once — colour, type, spacing — then every page is a variation.
Avoid systems vocabulary out loud. Say "we decided the rules once."

### 13 · The shared brief *(figure slide)*
**Runs across every phase.** Three ordinary documents, not software:
- Instructions — how we work
- Current status — what's true right now
- Project diary — what happened and why
This is what lets several people *and several AI assistants* work on one project without losing state.

### 14 · Phase 6 — Convert to WordPress *(figure slide)*
**The payoff.** Because the design was already working code, conversion is **translation rather than reconstruction**. The page the client approved is the page that ships.
Technically: WordPress's native editor plus structured fields, on a child theme. No page builder in the middle.

### 15 · The client's editing experience *(figure slide)*
They edit their own content without calling us. Two habits make it usable: labels in plain language, and the safe default stated inside the field.
291 content controls across the site. If a decision is still owed, the field is left empty rather than guessed.

### 16 · Phase 7 — Hand off to dev
Dev doesn't start from a static mockup and a blank template — they start from working pages and add the hard parts.
**Land this sentence:** *we pass to dev a fully designed front end that is ready for the more complex functionality our clients need.*
Already done: every page built and responsive, the design system in version control, editing controls the client owns. What dev adds: integrations, dynamic data, quoting flows, CRM and ERP connections.

### 17 · The payoff — what the client doesn't pay for
**Be precise here. This is the claim most likely to be challenged.**
- **Not needed:** page-builder licence — a builder would fight a bespoke design system, add lock-in, and cost more to maintain.
- **Not needed:** commercial theme licence — no purchased theme and no annual renewal.
- **One licence:** Advanced Custom Fields — a single plugin licence replaces both, and it's what gives the client structured, plain-language editing.

If asked about the parent theme: the build is a **child theme of the client's existing bespoke theme**, so there's no purchased theme and no renewal. A block theme would remove that dependency entirely — that's the next step, not something we've shipped. **Do not overclaim.**

### 18 · Verified, not assumed *(figure slide)*
The rule that prevents the worst failure: a control can render the design perfectly while being empty in the admin. Nothing looks broken, which is why it gets missed.
Real output: 279 of 291 controls applied. The other 12 are correct by design — a blank colour choice means "keep the design colour".

### 19 · The checklist
**The slide to keep.** Read the nine items aloud, slowly.

### 20 · Watch out for these
Priority key: **1** could have blocked the client from editing or damaged the approved design; **3** was friction. Every row leads with the fix.
The two "silent" roadblocks are the most instructive — they looked fine on screen. That pair is why the automated check exists.

### 21 · What it produced
Frame every number as a consequence of the process, not a trophy:
- 9 days from kickoff to a presentable draft
- 12 pages designed
- 291 controls the client owns
- 6 days to convert and verify the build

### 22 · Next steps — close on an ask
Two decisions:
1. **Adopt the process** — all seven phases as the default, including the sitemap and wireframe gates most teams skip.
2. **Fund the verification step** — so a control can never ship empty behind a site that looks correct.

---

## Likely questions

**"Do we design in Figma or in code?"**
Both, and they do different jobs. Figma is where the design is presented, discussed and approved. Code is where responsive behaviour and motion are worked out, because those are far quicker to judge in a browser. We keep them in step.

**"Isn't designing in code slower?"**
It's faster to *finish*. Changes take minutes instead of a redraw and re-export, and there's no translation step later where detail gets lost. Nine days from kickoff to a client-ready draft.

**"Why put code back into Figma?"**
Because the client reviews and comments in Figma. Artboards keep the design file complete and presentable without slowing the build down.

**"Why not use a page builder? The client could edit anything then."**
We costed it: 46–70 developer days, plus lock-in, and it can't reproduce a bespoke design system from stock components. Editor-plus-fields gives structured editing without the builder.

**"So there are no licences at all?"**
Precisely: no page-builder licence, no commercial theme licence. One plugin licence (ACF Pro) replaces both.

**"How does dev pick this up without a handover meeting?"**
The shared brief. Instructions, current status and a project diary live with the project, so a new team starts informed rather than guessing.

---

## Words to avoid out loud

Repository, commit, deploy, sync, tokens, CSS, ACF, field, environment, staging, checksum, component library, pipeline, block theme, child theme, artboard.

Say instead: the project files, saved, published, kept in step, shared style guide, styling, editing controls, control, the test site, file-by-file comparison, building blocks, the working draft, the design file, the design page.

When you *must* be technical — slide 17 and the parent-theme question — use the exact wording on the slide and stop there.
