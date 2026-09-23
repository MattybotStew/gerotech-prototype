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

> **Everything is built in code. Figma is where it's presented.** Wireframes, designs and the build itself are all made in code and shown in Figma, where the client comments — and those comments are mapped back to the code with Cursor. **That's why a content change takes minutes, not hours.**

## The three sentences that carry the deck

1. **"Everything is built in code. Figma is where it's presented and discussed."** (slide 3)
2. **"A wireframe content change is a five-minute edit — not hours of updating frames."** (slide 6)
3. **"We hand dev a designed front end that's ready for the complex functionality our clients need."** (slide 16)

## Tone rules

- The two tools are **not competitors**, and code is not "instead of" Figma. **Everything is built in code; Figma is where it's presented.** If you catch yourself saying "we design in code instead of Figma", stop — that's a version we corrected twice.
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
**This slide sets up everything after it.** Wireframes, moodboards, designs and comments all live in Figma — but **every one of them is built in code first**. Figma is the presentation and conversation layer; code is where the work is made.
Say it plainly: *everything is built in code, and Figma is where it's presented.*

### 04 · Phase 1 — Kickoff & discovery *(figure slide)*
We audit the live site before designing anything, so the redesign is grounded in facts.
The finding that shaped Gerotech: **the client could not edit their own content.** That became a hard requirement for the build. Note also that inventory content missing from the new structure was flagged for a client decision rather than silently dropped.

### 05 · Phase 2 — Sitemap *(figure slide)*
The structure is agreed before any design work, when changing it is free.
One decision here gets reused everywhere — navigation, mega-menu, mobile menu, breadcrumbs, search.

### 06 · Phase 3 — Wireframes *(figure slide — the content-speed argument)*
**Wireframes are built in code too**, then imported into Figma so the client reviews and comments there.
The reason is speed: text and section order live in one place, not repeated across dozens of drawn frames. **Changing wireframe content is a five-minute edit — not hours of updating frames one by one.**
Structure before style still applies: copy and section order get settled while changes are still cheap, and every section here becomes a section in the built page, in the same order.

### 07 · Phase 4 — Design & iterate *(figure slide — the heart of the method)*
Moodboards and reference sites set the direction; the homepage is agreed; then every page is designed in a loop between Figma and code.
**Neither tool does the other's job:** Figma is where the design is presented and discussed; code is where responsive behaviour and motion are worked out. Because it runs both ways, neither copy drifts.

### 08 · What the code prototype adds
**Frame this correctly** — code isn't a rival to Figma. It's where everything is actually made, and it's how we settle the things Figma is bad at judging:
- Responsive ideas tested for real (breakpoints, stacking, type scaling)
- Animation concepts the client can actually watch
- Layout experiments in minutes
- **Content updates in minutes, not hours** — change a heading or reorder sections once, not frame by frame
Also make the sequencing clear: **internal until design**, client-facing from the design phase onward.

### 09 · Every page, one system
The commercial point: new pages are **variations, not new decisions**. A shared style guide is what makes the tenth page as fast as the second.
Responsive is built as we go, not retrofitted at the end.

### 10 · HTML → Figma artboards *(figure slide)*
**The bridge that makes the whole approach work** — and it applies to wireframes as well as finished designs. Work built in code goes back into Figma as editable artboards, so the client reviews it in the room they already use.
This is the piece people miss: it's not "Figma *or* code". It's built in code, presented in Figma.
Tool: **html.to.design** — a Chrome extension plus a Figma plugin.

### 11 · Phase 5 — Review & approve *(figure slide)*
One feedback channel, in Figma. Notes attach to the exact spot, and each becomes a tracked item with an owner.
**The mechanism:** we map each Figma comment to the code **with Cursor**, make the change, and the updated build is imported back into Figma as artboards. The client never has to leave the room — and nothing is lost in translation.

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
**The slide to keep.** Read the ten items aloud, slowly.

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
Both, but they do different jobs. **Everything is built in code** — wireframes included. **Figma is where it's presented, discussed and approved.** Code is also where responsive behaviour and motion are worked out, because those are far quicker to judge in a browser.

**"Isn't building wireframes in code slower?"**
It's much faster to *change*. In drawn frames, updating copy across a wireframe means editing every frame that repeats it — hours. In code, text and structure live in one place, so it's a **five-minute edit**, and the client sees the result immediately.

**"Why put code back into Figma?"**
Because the client reviews and comments in Figma. Artboards keep the design file complete and presentable without slowing the build down — and they're how the comment-to-code loop works.

**"How do Figma comments actually get actioned?"**
We map each comment to the code **with Cursor**. The change is made once, in one place, and the updated build is imported back into Figma as artboards. The client comments where the work is and never has to leave the room.

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
