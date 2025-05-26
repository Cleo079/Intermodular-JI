class MiElemento extends HTMLElement{
    constructor(){
        super();
        
        this.attachShadow({mode: 'open'});

        const plantilla = document.createElement('plantilla');
        plantilla.innerHTML = `
            <style>
                p {
                    color: blue;
                }
            </style>
            <img src="../../img/tiger.avif" alt="Tiger Image" width="140xp">
            <p>elemento normal</p>
        `;

        this.shadowRoot.appendChild(plantilla.cloneNode(true));
    }
}

customElements.define('mi-elemento', MiElemento);