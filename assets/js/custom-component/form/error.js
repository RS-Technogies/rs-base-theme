class ErrorList extends HTMLElement {
    constructor() {
        super();
    }

    // connectedCallback() {
    //
    //     this.innerHTML = ``;
    // }
    static get observedAttributes() {
        return ['errors'];
    }

    attributeChangedCallback(name, oldValue, newValue) {
        console.log(newValue);
        if (name === 'errors') {
            this.renderErrors(JSON.parse(newValue));
        }
    }

    renderErrors(errors) {
        const classes=this.getAttribute('classes');
        this.innerHTML = `<ul class='${classes}'>${errors.map((item)=>`<li>${item}</li>`).join(``)}</ul>`;
    }

}

customElements.define('error-list', ErrorList);