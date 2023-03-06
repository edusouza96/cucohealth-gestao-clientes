<script setup>
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
    <div>
        <header>
            <div class="wrapper">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Cuco Health</a>
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup"
                            aria-controls="navbarNavAltMarkup"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div
                            class="collapse navbar-collapse"
                            id="navbarNavAltMarkup"
                        >
                            <div class="navbar-nav">
                                
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <main class="">
            <RouterView />
        </main>
    </div>
</template>