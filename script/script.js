import Swiper from "swiper";
import { Navigation } from "swiper/modules";

import 'swiper/css';
import 'swiper/css/navigation';

const swiper = new Swiper ('.swiper', {
    direction: "vertical",
    loop: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});