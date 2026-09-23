# Speaker notes — Building the Design Before the Approval

**Companion to:** `case-study/gerotech-process-playbook.html`
**Audience:** CloudMellow leadership
**Tone:** plain language, low candor, fix-first
**Runtime:** ~17 minutes at ~1 minute per slide, plus questions

---

## How to run the deck

- Open `case-study/gerotech-process-playbook.html` in a browser. No server needed.
- **← / →** (or click Prev/Next, or swipe) to navigate. **N** toggles speaker notes. **P** prints — use "Save as PDF" for a handout; each slide prints on its own landscape page.
- Deep-link any slide with `#slide-7` in the address bar.

## The one thing to land

> The prototype wasn't a deliverable. It was **schedule insurance that turned into the spec**.

Say that in the first two minutes and again at slide 16. Everything else supports it.

---

## Slide-by-slide

### 01 · Title — four threads
Open by naming the format: this is a **method deck**, and Gerotech is the worked example. Point at the four threads on screen and say the deck returns to each one.
*Ask we're building toward:* agreement to reuse the method on the next engagement.

### 02 · The idea
The decision rule is the point. Say **when** to use prototype-first (a gate is blocking you, the deadline is fixed, the design is complex) and, just as clearly, **when not to** (scope still moving, audience needs strategy not an artefact).
The second column is what keeps this from sounding like a boast.

### 03 · What we built
Nine days to a presentable draft. Say plainly: **built by hand, with no website software in the way.**
The placeholder message matters: placeholders *expose* decisions that are still owed. They are honest, not unfinished.

### 04 · A style guide from day one
Avoid all systems vocabulary out loud. Say: **"we decided the rules once, then every page was a variation."**
Commercial benefit: page 12 is as fast to build as page 2, and the look survives more people touching it.

### 05 · The payoff — the key slide
**Slow down here.** Nothing was thrown away; the pages the client approved were the pages we built from.
Use the sentence: *"When the draft is the specification, approval and build can't drift apart."*
This is the argument for adoption.

### 06 · Scaling up
Honest, blameless framing: growth exposed a **coordination** gap, not a quality gap. We closed it with two mechanisms — the next two slides.

### 07 · Mechanism one — one feedback channel
Plain version: **the client commented directly on the design, and each comment became a task we could tick off.**
If asked why it mattered: it stopped long review cycles turning into arguments about what was agreed.

### 08 · Mechanism two — shared memory
Demystify immediately: these are **three ordinary documents**, not software.
- Instructions — how we work
- Current status — what's true now
- Project diary — what happened and why
Leadership takeaway: continuity is a **process choice**, not a technology feature.

### 09 · Tooling
Say it once, factually: assistants ran inside **Cursor** and **VS Code**, using **Cline** and **opencode** on **DeepSeek**. People set direction and made every decision.
If asked whether tools will change: yes — which is exactly why the brief, not the tool, carries continuity.

### 10 · Roadblocks in how we worked
Lead with the priority key: **1 = could have stalled delivery, 3 = friction.**
Each row leads with the fix. The message is that problems surfaced and each produced a **lasting** process change — not a one-off patch.

### 11 · Choosing how to build it
This slide protects the team. Route A (rebuilding every custom section in a page builder) was genuinely costed at **46–70 developer days** and rejected on evidence, not preference.
Keep the detail high-level; leadership needs the reasoning, not the tooling.

### 12 · The bridge
Plain version: **we agreed which copy was authoritative at each stage, and verified it automatically instead of trusting memory.**
This is what prevented "it looked right on our screen" conversations.

### 13 · The build
Six days. Attribute the speed to **preparation, not shortcuts** — the design was already a working reference, so the build was translation, not invention.
Result line: 14 pages live and verified.

### 14 · Roadblocks in the build — the most important roadblock slide
Two of these were **silent**: the site looked correct while the client's editing controls were empty, and a routine save quietly overwrote approved colours. Nothing looked broken.
That pair is the case for the standing rule — **a fix isn't done until it's verified automatically.**
Say the priority key again: 1 could have blocked client editing or damaged the design; 3 was friction.

### 15 · What we achieved
Frame every number as a **consequence of the method**:
- 12 pages designed
- 291 editing controls the client owns (so they don't have to call us)
- 14 pages live and verified
- ~3 months from draft to live test site

### 16 · The playbook — the slide to keep
Read the eight rules aloud, slowly. Everything before this slide is justification; everything after is next steps.
If you only leave one slide on screen, leave this one.

### 17 · What's next — close on an ask
Two decisions:
1. **Adopt the method** — instructions, status and diary as the default on the next project.
2. **Fund the verification step** — so silent problems can't reach a client-facing site.

The "still open" line is deliberately brief: enough to show nothing is hidden, without turning the close into a risk review.

---

## Likely questions

**"Couldn't the client see it was broken?"**
No — that's what made those two roadblocks dangerous. The site rendered correctly; only the editing controls were empty. That's why we now verify automatically rather than by eye.

**"Did using AI mean less oversight?"**
The opposite. Humans set direction and approved every change. The AI work was faster because the brief was written down, not because the review was lighter.

**"What did the prototype cost us?"**
Nine days to the first draft. It paid for itself twice: it unblocked the design phase, then removed the ambiguity from the build.

**"Will this work on a smaller project?"**
Yes — the three documents scale down to a paragraph each. The rule is: if more than one session will touch the work, write the brief down.

**"What if the client changes their mind after approval?"**
That's exactly what the style guide is for. Rules decided once mean a change is a variation, not a rebuild — and the comparison checks show precisely what moved.

---

## Words to avoid out loud

Repository, commit, deploy, sync, tokens, CSS, ACF, field, ACF repeater, environment, staging, checksum, component library, pipeline.

Say instead: project files, saved, published, kept in step, shared style guide, styling, editing controls, control, the test site, file-by-file comparison, building blocks.
