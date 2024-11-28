import './bootstrap';
import { tes } from './global';

import Alpine from "alpinejs";
import anchor from "@alpinejs/anchor";
import collapse from "@alpinejs/collapse";

window.tes = tes;

Alpine.plugin(anchor);
Alpine.plugin(collapse);

const modules = import.meta.glob("./plugins/**/*.js", { eager: true });

for (const path in modules) {
    Alpine.plugin(modules[path].default);
}

Alpine.start();
