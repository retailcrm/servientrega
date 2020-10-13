<template>
    <div>
        <ConnectionForm :current="connection" @save="create" :loading="loading"/>
        <md-dialog-alert :md-active.sync="dialog" :md-content="$t('errors.create')" :md-confirm-text="$t('dialog.close')" />
    </div>
</template>

<script>
    import ConnectionApi from "../api/connection";
    import ConnectionForm from "../components/ConnectionForm";

    export default {
        name: "Index",
        components: {ConnectionForm},
        data() {
            return {
                dialog: false,
                loading: false,
                connection: {}
            }
        },
        methods: {
            async create(connection) {
                try {
                    this.loading = true;

                    await ConnectionApi.create(connection);
                    await this.$router.push('settings');
                } catch (e) {
                    this.dialog = true;
                } finally {
                    this.loading = false;
                }
            }
        }
    }
</script>

<style scoped>

</style>
