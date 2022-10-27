const Modal = () => {
    return {
        show: false,
        showModal() {
            this.show = true;
        },
        hide() {
            this.show = false;
        }
    }
}

export default Modal;