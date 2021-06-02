class Loader extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        this.innerHTML = `<div class="loader"></div>`;
    }
}

customElements.define('cs-loader', Loader);