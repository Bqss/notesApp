const Dropdown = () => {
    return {
        show:  false,
        
        toggle() {
            this.show = !this.show;
        },
        hide() {
            this.show = false;
        }
    }
}

export default Dropdown;