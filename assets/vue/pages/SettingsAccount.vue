<template>
    <UiIntegrationLayout
        :integration="this.$t('connection.title.integration')"
        integration-link="#"
        :integration-value="this.$t('connection.title.name')"
        integration-value-link="#"
        doc-link="https://help.retailcrm.es"
    >
        <template #asideContent>
            <Menu :current="'account'"></Menu>
        </template>
        <template #mainContent>
            <UiLoader v-if="loading"></UiLoader>
            <form @submit.prevent="save">
                <UiContentBox class="ui-connect-box ui-connect-box_min">
                    <UiAlert v-if="error" :type="'error'" :title="error"></UiAlert>
                    <div class="ui-connect-form ui-connect-form_full">
                        <div class="ui-connect-form__row ui-connect-form__row_start ui-connect-form__row_edit">
                            <UiText
                                tag="label"
                                class="ui-connect-form__label"
                            >
                                {{ $t('connection.form.servientrega_login') }}
                            </UiText>
                            <UiInput
                                v-model="connection.servientregaLogin"
                                required
                            />
                        </div>
                    </div>
                    <div class="ui-connect-form ui-connect-form_full">
                        <div class="ui-connect-form__row ui-connect-form__row_start ui-connect-form__row_edit">
                            <UiText
                                tag="label"
                                class="ui-connect-form__label"
                            >
                                {{ $t('connection.form.servientrega_password') }}
                            </UiText>
                            <UiInput
                                v-model="connection.servientregaPassword"
                                :type="'password'"
                                required
                            />
                        </div>
                    </div>
                    <div class="ui-connect-form ui-connect-form_full">
                        <div class="ui-connect-form__row ui-connect-form__row_start ui-connect-form__row_edit">
                            <UiText
                                tag="label"
                                class="ui-connect-form__label"
                            >
                                {{ $t('connection.form.servientrega_billing_code') }}
                            </UiText>
                            <UiInput
                                v-model="connection.servientregaBillingCode"
                                required
                            />
                        </div>
                    </div>
                    <div class="ui-connect-form ui-connect-form_full">
                        <div class="ui-connect-form__row ui-connect-form__row_start ui-connect-form__row_edit">
                            <UiText
                                tag="label"
                                class="ui-connect-form__label"
                            >
                                {{ $t('connection.form.servientrega_name_pack') }}
                            </UiText>
                            <UiInput
                                v-model="connection.servientregaNamePack"
                                required
                            />
                        </div>
                    </div>
                    <div class="ui-connect-form ui-connect-form_full">
                        <div class="ui-connect-form__row ui-connect-form__row_start ui-connect-form__row_edit">
                            <UiText
                                tag="label"
                                class="ui-connect-form__label"
                            >
                                {{ $t('connection.form.id_dane_origin_city') }}
                            </UiText>
                            <UiInput
                                v-model="connection.idDaneOriginCity"
                                required
                            />
                        </div>
                    </div>
                    <div class="ui-connect-form__row ui-connect-form__row_inline ui-connect-form__row_edit">
                        <UiButton
                            :disabled="loading"
                            :state="loading ? 'loading' : 'default'"
                            size="sm"
                            form-type="'submit'"
                        >
                            {{ $t('button.save') }}
                        </UiButton>
                    </div>
                </UiContentBox>
            </form>
        </template>
    </UiIntegrationLayout>
</template>

<script>
    import ConnectionApi from "../api/connection";
    import Menu from "../components/Menu";

    export default {
        name: "SettingsAccount",
        components: { Menu },
        data() {
            return {
                error: '',
                loading: true,
                connection: {}
            }
        },
        mounted() {
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
            },
            async save() {
                try {
                    this.loading = true;
                    const resp = await ConnectionApi.saveAccount(this.connection);
                    this.connection = resp.data.connection;
                } catch (e) {
                    this.error = this.$t('errors.account_save');
                } finally {
                    this.loading = false;
                }
            }
        }
    }
</script>

<style scoped>

</style>
