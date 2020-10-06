<template>
    <div>
        <form class="md-layout md-gutter md-alignment-center">
            <md-card class="md-layout-item md-size-50">
                <md-card-content>
                    <md-field>
                        <label for="crmUrl">{{ $t('connection.form.crm_url') }}</label>
                        <md-input
                            id="crmUrl"
                            v-model="connection.crmUrl"
                            name="crmUrl"
                        />
                    </md-field>
                    <md-field>
                        <label for="apiKey">{{ $t('connection.form.api_key') }}</label>
                        <md-input
                            id="apiKey"
                            v-model="connection.apiKey"
                            name="apiKey"
                        />
                    </md-field>
                    <md-field>
                        <label for="servientregaLogin">{{ $t('connection.form.servientrega_login') }}</label>
                        <md-input
                            id="servientregaLogin"
                            v-model="connection.servientregaLogin"
                            name="servientregaLogin"
                        />
                    </md-field>
                    <md-field>
                        <label for="servientregaPassword">{{ $t('connection.form.servientrega_password') }}</label>
                        <md-input
                            id="servientregaPassword"
                            v-model="connection.servientregaPassword"
                            name="servientregaPassword"
                        />
                    </md-field>
                    <md-field>
                        <label for="apiKey">{{ $t('connection.form.servientrega_billing_code') }}</label>
                        <md-input
                            id="servientregaBillingCode"
                            v-model="connection.servientregaBillingCode"
                            name="servientregaBillingCode"
                        />
                    </md-field>
                    <md-field>
                        <label for="servientregaNamePack">{{ $t('connection.form.servientrega_name_pack') }}</label>
                        <md-input
                            id="servientregaNamePack"
                            v-model="connection.servientregaNamePack"
                            name="servientregaNamePack"
                        />
                    </md-field>
                    <md-button
                        class="md-primary md-raised"
                        @click="save"
                    >
                        Save
                    </md-button>
                </md-card-content>
            </md-card>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Connection",
        props: {
            current: {
                type: Object,
                default: () => {
                    return {}
                }
            }
        },
        data() {
            return {
                connection: this.current
            }
        },
        methods: {
            save() {
                this.$emit('save', this.connection);
            }
        }
    }
</script>

<style scoped>

</style>
