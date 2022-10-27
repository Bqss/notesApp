const Theme = {
    isDark : null,
    init(){
        this.isDark = JSON.parse(localStorage.getItem("dark")) ?? true;
    } ,

    toggle() {
        this.isDark = !this.isDark;
    },
    update(value) {
        localStorage.setItem('dark', JSON.stringify(value))
    }
}

export default Theme;
