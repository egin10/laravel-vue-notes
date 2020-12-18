<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <router-link class="navbar-brand" :to="{ name: 'home'}">SomeLogo</router-link>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <router-link class="nav-link" exact :to="{name: 'home'}" >Home </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{name: 'about'}">About</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{name: 'contact'}">Contact</router-link>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        Subject
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="#" class="dropdown-item">New Subject</a>
                        <a href="#" class="dropdown-item">Table of Notes</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        Note
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <router-link class="dropdown-item" :to="{name: 'notes.create'}">New Note</router-link>
                        <router-link class="dropdown-item" :to="{name: 'notes.table'}">Table of Notes</router-link>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input
                    class="form-control mr-sm-2"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                />
                <button
                    class="btn btn-outline-light my-2 my-sm-0"
                    type="submit"
                >
                    Search
                </button>
            </form>
        </div>
    </nav>
</template>

<script>
export default {
    
};
</script>
