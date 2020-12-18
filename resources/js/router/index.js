import Home from "../views/Home";
import About from "../views/About";
import Contact from "../views/Contact";
import NewNote from "../views/notes/Create";
import TableOfNote from "../views/notes/Table";
import ShowTheNote from "../views/notes/Show";
import EditNote from "../views/notes/Edit";

export default {
    mode: "history",
    linkActiveClass: "active",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/about",
            name: "about",
            component: About
        },
        {
            path: "/contact",
            name: "contact",
            component: Contact
        },
        {
            path: "/notes/create",
            name: "notes.create",
            component: NewNote
        },
        {
            path: "/notes/table",
            name: "notes.table",
            component: TableOfNote
        },
        {
            path: "/notes/:slug",
            name: "notes.show",
            component: ShowTheNote
        },
        {
            path: "/notes/:slug/edit",
            name: "notes.edit",
            component: EditNote
        }
    ]
};
