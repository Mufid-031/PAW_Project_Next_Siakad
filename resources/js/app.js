import './bootstrap';

import Alpine from "alpinejs";
import anchor from "@alpinejs/anchor";
import collapse from "@alpinejs/collapse";
 
Alpine.plugin(anchor);
Alpine.plugin(collapse);
 
const modules = import.meta.glob("./plugins/**/*.js", { eager: true });
 
for (const path in modules) {
    Alpine.plugin(modules[path].default);
}
 
Alpine.start();