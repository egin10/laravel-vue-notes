import Home from "../views/Home";
import About from "../views/About";
import Contact from "../views/Contact";

// Note Pages
import NewNote from "../views/notes/Create";
import TableOfNote from "../views/notes/Table";
import ShowTheNote from "../views/notes/Show";
import EditNote from "../views/notes/Edit";

// Subject Pages
import TableOfSubject from "../views/subjects/Table";
import NewSubject from "../views/subjects/Create";
import ShowTheSubject from "../views/subjects/Show";
import EditSubject from "../views/subjects/Edit";

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
        },

        {
            path: "/subjects",
            name: "subjects.table",
            component: TableOfSubject
        },
        {
            path: "/subjects/create",
            name: "subjects.create",
            component: NewSubject
        },
        {
            path: "/subjects/:slug",
            name: "subjects.show",
            component: ShowTheSubject
        },
        {
            path: "/subjects/:slug/edit",
            name: "subjects.edit",
            component: EditSubject
        }
    ]
};
