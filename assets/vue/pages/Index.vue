<template>
    <div>
        <ConnectionForm
            :current="connection"
            @save="create"
        />
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
                connection: {
                    crmUrl: '',
                    apiKey: '',
                    servientregaLogin: '',
                    servientregaPassword: '',
                    servientregaBillingCode: '',
                    servientregaNamePack: '',
                }
            }
        },
        methods: {
            async create(connection) {
                await ConnectionApi.create(connection);

                await this.$router.push('settings');
            }
        }
    }
</script>

<style scoped>

</style>
