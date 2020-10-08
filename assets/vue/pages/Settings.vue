<template>
    <ConnectionForm v-if="Object.keys(connection).length > 0" :current="connection" />
</template>

<script>
    import ConnectionForm from "../components/ConnectionForm";
    import ConnectionApi from "../api/connection";

    export default {
        name: "Settings",
        components: {ConnectionForm},
        data() {
            return {
                connection: {}
            }
        },
        created() {
            this.get();
        },
        methods: {
            async get() {
                try {
                    const resp = await ConnectionApi.current();
                    this.connection = resp.data;
                } catch (e) {
                    this.$router.push('/');
                }
            }
        }
    }
</script>

<style scoped>

</style>
