<template>
    <div>
        <form
            class="md-layout md-alignment-center"
            @submit.prevent="save"
        >
            <md-card
                :class="`${active}`"
                class="md-layout-item md-size-50"
            >
                <md-card-content>
                    <md-field>
                        <label for="crmUrl">{{ $t('connection.form.crm_url') }}</label>
                        <md-input
                            id="crmUrl"
                            v-model="connection.crmUrl"
                            required
                            name="crmUrl"
                            :disabled="loading"
                            type="text"
                        />
                    </md-field>
                    <md-field>
                        <label for="apiKey">{{ $t('connection.form.api_key') }}</label>
                        <md-input
                            id="apiKey"
                            v-model="connection.apiKey"
                            required
                            name="apiKey"
                            :disabled="loading"
                        />
                    </md-field>
                    <md-field>
                        <label for="servientregaLogin">{{ $t('connection.form.servientrega_login') }}</label>
                        <md-input
                            id="servientregaLogin"
                            v-model="connection.servientregaLogin"
                            required
                            name="servientregaLogin"
                            :disabled="loading"
                        />
                    </md-field>
                    <md-field>
                        <label for="servientregaPassword">{{ $t('connection.form.servientrega_password') }}</label>
                        <md-input
                            id="servientregaPassword"
                            v-model="connection.servientregaPassword"
                            required
                            name="servientregaPassword"
                            type="password"
                            :disabled="loading"
                        />
                    </md-field>
                    <md-field>
                        <label for="apiKey">{{ $t('connection.form.servientrega_billing_code') }}</label>
                        <md-input
                            id="servientregaBillingCode"
                            v-model="connection.servientregaBillingCode"
                            required
                            name="servientregaBillingCode"
                            :disabled="loading"
                        />
                    </md-field>
                    <md-field>
                        <label for="servientregaNamePack">{{ $t('connection.form.servientrega_name_pack') }}</label>
                        <md-input
                            id="servientregaNamePack"
                            v-model="connection.servientregaNamePack"
                            required
                            name="servientregaNamePack"
                            :disabled="loading"
                        />
                    </md-field>
                    <md-button
                        type="submit"
                        class="md-primary md-raised"
                        :disabled="loading"
                    >
                        Save
                    </md-button>
                </md-card-content>
            </md-card>
            <md-progress-spinner
                v-if="loading"
                :md-diameter="150"
                :md-stroke="5"
                md-mode="indeterminate"
            />
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
            },
            loading: {
                type: Boolean,
                default: () => {
                    return false;
                }
            }
        },
        data() {
            return {}
        },
        computed: {
            connection() {
                return this.current;
            },
            active() {
                return this.loading ? 'inActive' : ''
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
    .md-progress-spinner {
        position: fixed;
        z-index: 9999;
    }

    .inActive {
        opacity: 0.5;
    }
</style>
