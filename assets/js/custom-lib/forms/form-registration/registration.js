export default class FormRegistration {

    constructor(elem) {
        if(typeof elem ==="string"){
            this.el=document.querySelector(elem);
        }else{
            this.el=elem;
        }

        if(this.el) {
            this.init();
            this.setProgressBar(this.current);
            this.handleEvents();
            this.disableButtons();
        }
    }

    init() {
        this.events = [];
        this.valid = true;
        this.steps = this.el.querySelectorAll(".steps");
        this.form = this.el.querySelector("form");
        this.progress = this.el.querySelector(".progress-bar");
        this.progress_bars = this.el.querySelector("#progressbar").querySelectorAll("li");
        this.next_elem = this.el.querySelector(".next");
        this.previous_elem = this.el.querySelector(".previous");
        this.step_count = (this.steps.length - 1);
        this.opacity = null;
        this.current = 0;
        setTimeout(() => {
            this.sendEvent("init", [this.form]);
        }, 0);
    }

    setValid(valid) {
        this.valid = valid;
    }

    handleEvents() {
        this.next_elem.addEventListener("click", () => {
            this.next();
        });
        this.previous_elem.addEventListener("click", () => {
            this.previousElement();
        });
    }

    setProgressBar(curStep) {
        let count = this.step_count + 1;
        let percent = (100 / count) * (curStep + 1);
        percent = percent.toFixed();
        this.progress.style.width = percent + "%";
    }

    next() {
        if (this.current === this.step_count) {
            this.submit();
            return;
        }
        this.sendEvent("next", [this.current, this.form]);
        if (!this.valid) {
            return;
        }
        this.current++;
        this.setProgressBar(this.current);
        this.render(this.current - 1);
    }

    previousElement() {
        if (this.current === 0) {
            return;
        }
        this.current--;
        this.setProgressBar(this.current);
        this.render(this.current + 1);
    }

    render(index) {
        this.steps[index].classList.remove("active");
        this.steps[index].classList.add("hidden");
        this.steps[this.current].classList.remove("hidden");
        this.steps[this.current].classList.remove("active");
        this.disableButtons();
    }

    disableButtons() {
        this.previous_elem.disabled = this.current === 0;
        let text = this.next_elem.innerHTML;
        if (this.current === this.step_count) {
            this.next_elem.innerHTML = "Submit";
        } else if (text === "Submit" && this.current !== this.step_count) {
            this.next_elem.innerHTML = "Next";
        }
    }

    submit() {
        if (this.form) {
            if (!this.events.includes("submit")) {
                this.form.submit();
            } else {
                this.sendEvent("submit", [
                    this.form
                ]);
            }
        }
    }

    sendEvent(event_name, params = []) {
        let event = new CustomEvent(event_name, {
            detail: {params}
        });
        this.el.dispatchEvent(event);
    }

    on(event, callback) {
        if(!this.events){
            return this;
        }
        this.events.push(event);
        this.el.addEventListener(event, (e) => {
            const {params} = e.detail;
            callback.apply(null, params);
        });
        return this;
    }
}
