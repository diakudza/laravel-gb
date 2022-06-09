<template>
     <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <Link class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">Admin panel</Link>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <Link class="nav-link px-3" :href="route('logout')"> {{$attrs.auth.user.name}}</Link>
        </div>
    </div>
    </header>


    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <SideMenu />
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <Error :flash="$attrs.flash" :errors="$attrs.errors"/>
                <slot/>
            </main>
        </div>
    </div>

</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";
import SideMenu from "../Pages/Admin/Components/SideMenu";
import Error from "./Error";
export default {
    name: "Layout",
    components: {
       Error,
       SideMenu,
        Link,
    }
}

</script>

<style scoped>

</style>
