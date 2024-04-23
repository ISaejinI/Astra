import Swiper from "../node_modules/swiper";
import { Navigation } from "../node_modules/swiper/modules";

const swiper = new Swiper ('.swiper', {
    direction: "vertical",
    loop: true,
    modules: [Navigation],
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    }
});