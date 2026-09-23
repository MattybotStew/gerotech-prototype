# Speaker notes — From Kickoff Call to Dev-Ready Build

**Companion to:** `case-study/gerotech-process-playbook.html`
**Audience:** CloudMellow leadership
**Format:** eight-phase process, taught from the Gerotech website redesign
**Runtime:** ~20 minutes at roughly a minute per slide, plus questions

---

## How to run the deck

- Open `case-study/gerotech-process-playbook.html` in a browser. No server needed — the screenshots sit in `case-study/images/`.
- **← / →** (or click Prev/Next, or swipe) to navigate. **N** toggles speaker notes. **P** prints — use "Save as PDF" for a handout; each slide lands on its own landscape page.
- Deep-link any slide with `#slide-7` in the address bar.
- Every visual is real: the wireframe and design file from Figma, the working prototype, the live WordPress site, the client's own admin, and genuine audit output.

## The one thing to land

> We design **in code**, keep the **design file in step**, and convert the result to WordPress with **no page builder and no commercial theme** — so dev inherits a working front end instead of a mockup.

Say that in the first two minutes and again at phases 4, 7 and 8.

## The three sentences that carry the deck

1. **"The design isn't a picture of a website — it is the website."** (Phase 4)
2. **"No page-builder licence, no commercial theme licence — one plugin licence replaces both."** (The payoff)
3. **"We hand dev a designed front end that's ready for the complex functionality our clients need."** (Phase 8)

## Tone rules

- Talk in outcomes and decisions, never technology. The deck deliberately avoids tool vocabulary.
- Never say "zero licences". The precise claim is in slide 15 — use it exactly.
- Phases 1–3 are the ones teams skip. When you get there, say why skipping them makes phases 4–6 expensive.

---

## Slide-by-slide

### 01 · Title
Name the format: a **process in eight phases**, with Gerotech as the worked example. Point at the eight-word strip along the bottom — that's the whole thing.

### 02 · The process at a glance
Walk the eight phases, one line each. Do not go into detail — this is the map. Then read the "use it when" line: bespoke design, client needs to edit, project will grow.

### 03 · Phase 1 — Kickoff & discovery *(figure slide)*
We audited the live site before designing anything, so the redesign was grounded in facts.
**The finding that shaped everything:** the client could not edit their own page content. That became a hard requirement for the build. Note also that inventory content missing from the new structure was **flagged for a client decision** rather than silently dropped.

### 04 · Phase 2 — Sitemap *(figure slide)*
The structure is agreed before any design work, when changing it is free.
One decision here gets reused everywhere — navigation, mega-menu, mobile menu, breadcrumbs, search. That's why the same heading sits in the same place on all twelve pages.

### 05 · Phase 3 — Wireframes *(figure slide)*
Structure before style. This is a **real wireframe** from the design file — grey boxes where photography goes, placeholder copy, declared image ratios.
The point: nobody debates structure during visual design, because that argument already happened here.

### 06 · Phase 4 — Design built in code *(the headline idea)*
**Slow down.** This is the differentiator, and everything else follows from it.
The design is built as a working front end — real layout, real type, real breakpoints. The client reviews a page they can scroll and click. Feedback becomes a change in minutes, not a redraw and a re-export. And **nothing is thrown away** — this becomes the build.

### 07 · Phase 4 continued — every page
The commercial point: new pages are **variations, not new decisions**. A shared style guide is what makes the tenth page as fast as the second.
Responsive is built as we go, not retrofitted at the end.

### 08 · Phase 5 — The iteration loop *(figure slide)*
The design file doesn't get abandoned — it stays in step with the code, and changes flow both directions.
In practice this is driven from the editor: an AI assistant working against the shared brief makes the change in code, and the design file is updated to match what was approved.
**Why keep both:** the client and their stakeholders are comfortable reviewing in the design file; the code is what actually ships.

### 09 · Phase 6 — Review & approve *(figure slide)*
One feedback channel. Notes attach to the exact spot in the design, and each becomes a tracked item with an owner.
These are real comments from the Gerotech design file. The benefit: a long review cycle never turns into an argument about what was agreed.

### 10 · The style guide *(figure slide)*
**Runs across every phase.** Decide the rules once — colour, type, spacing — then every page is a variation.
Avoid systems vocabulary out loud. Say: "we decided the rules once."

### 11 · The shared brief *(figure slide)*
**Runs across every phase.** Three ordinary documents, not software:
- Instructions — how we work
- Current status — what's true right now
- Project diary — what happened and why
This is what lets several people *and several AI assistants* work on one project without losing state.

### 12 · Phase 7 — Convert to WordPress *(figure slide)*
**The payoff slide for the build.** Because the design was already working code, conversion is **translation rather than reconstruction**. The page the client approved is the page that ships.
Technically: WordPress's native editor plus structured fields, on a child theme. No page builder in the middle.

### 13 · The client's editing experience *(figure slide)*
They edit their own content without calling us. Two habits make it usable: labels in plain language, and the safe default stated inside the field.
291 content controls across the site. If a decision is still owed, the field is left empty rather than guessed.

### 14 · Phase 8 — Hand off to dev
Dev doesn't start from a static mockup and a blank template — they start from working pages and add the hard parts.
**Land this sentence:** *we pass to dev a fully designed front end that is ready for the more complex functionality our clients need.*
Already done: every page built and responsive, the whole design system in version control, editing controls the client owns. What dev adds: integrations, dynamic data, quoting flows, CRM and ERP connections.

### 15 · The payoff — what the client doesn't pay for
**Be precise here. This is the claim most likely to be challenged.**
- **Not needed:** page-builder licence — a builder would fight a bespoke design system, add lock-in, and cost more to maintain.
- **Not needed:** commercial theme licence — no purchased theme and no annual renewal.
- **One licence:** Advanced Custom Fields — a single plugin licence replaces both, and it's what gives the client structured, plain-language editing.

If asked about the parent theme: the build is a **child theme of the client's existing bespoke theme**, so there's no purchased theme and no renewal. A block theme would remove that dependency entirely — that's the next step, not something we've shipped. **Do not overclaim.**

### 16 · Verified, not assumed *(figure slide)*
The rule that prevents the worst failure: a control can render the design perfectly while being empty in the admin. Nothing looks broken, which is why it gets missed.
Real output: 279 of 291 controls applied. The other 12 are correct by design — a blank colour choice means "keep the design colour".

### 17 · The checklist
**The slide to keep.** Everything before it is justification; everything after is next steps.
Read the nine items aloud, slowly.

### 18 · Watch out for these
Priority key: **1** could have blocked the client from editing or damaged the approved design; **3** was friction. Every row leads with the fix.
The two "silent" roadblocks are the most instructive — they looked fine on screen. That pair is why the automated check exists.

### 19 · What it produced
Frame every number as a consequence of the process, not a trophy:
- 9 days from kickoff to a presentable draft
- 12 pages designed in code
- 291 controls the client owns
- 6 days to convert and verify the build

### 20 · Next steps — close on an ask
Two decisions:
1. **Adopt the process** — all eight phases as the default, including the sitemap and wireframe gates most teams skip.
2. **Fund the verification step** — so a control can never ship empty behind a site that looks correct.

---

## Likely questions

**"Isn't designing in code slower than designing in Figma?"**
No — it's faster to *finish*. Changes take minutes instead of a redraw and re-export, and there is no translation step later where detail gets lost. Nine days from kickoff to a client-ready draft.

**"Do we still need Figma?"**
Yes, and we keep it in step. The design file is what stakeholders are comfortable reviewing, and it's the record of what was approved. It just isn't the thing we build from.

**"Why not use a page builder? The client could edit anything then."**
We costed it: 46–70 developer days, plus lock-in, and it can't reproduce a bespoke design system from stock components. The editor-plus-fields approach gives the client structured editing *without* the builder.

**"So there are no licences at all?"**
Precisely: no page-builder licence, no commercial theme licence. One plugin licence (ACF Pro) replaces both and powers the editing experience.

**"What if the client wants to change the design after launch?"**
That's what the style guide is for — a change is a variation, not a rebuild. And because the design system is in version control, it doesn't depend on us remembering.

**"How does dev pick this up without a handover meeting?"**
The shared brief. Instructions, current status and a project diary live with the project, so a new team starts informed rather than guessing.

---

## Words to avoid out loud

Repository, commit, deploy, sync, tokens, CSS, ACF, field, environment, staging, checksum, component library, pipeline, block theme, child theme.

Say instead: the project files, saved, published, kept in step, shared style guide, styling, editing controls, control, the test site, file-by-file comparison, building blocks, the working draft, the design file.

When you *must* be technical — slide 15 and the parent-theme question — use the exact wording on the slide and stop there.
