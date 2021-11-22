<template>
    <main>
        <h2>MAIN</h2>
    </main>
</template>

<script>

    export default {
        name: "Main",
        mounted() {
            axios.get("/api/posts")
            .then(function(response) {
                console.log(response);
            })
            .catch(function(error) {
                console.log(error);
            })
        }
    }

</script>