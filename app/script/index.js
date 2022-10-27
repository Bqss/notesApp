import Alpine from 'alpinejs';
import Theme from "./store/Theme";
import Dropdown from "./components/Dropdown";
import Modal from "./components/Modal";



window.Alpine = Alpine;
Alpine.store("theme", Theme);
Alpine.data("dropdown", Dropdown);
Alpine.data("modal", Modal);
Alpine.start();
