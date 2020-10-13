<template>
    <ConnectionForm class="md-layout-item" :current="connection" :loading="loading" />
</template>

<script>
    import ConnectionForm from "../components/ConnectionForm";
    import ConnectionApi from "../api/connection";

    export default {
        name: "Settings",
        components: {ConnectionForm},
        data() {
            return {
                loading: true,
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
                    await this.$router.push('/');
                } finally {
                    this.loading = false;
                }
            }
        }
    }
</script>

<style scoped>

</style>
