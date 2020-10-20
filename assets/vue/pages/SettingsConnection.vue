<template>
    <UiIntegrationLayout
        :integration="this.$t('connection.title.integration')"
        integration-link="#"
        :integration-value="this.$t('connection.title.crm')"
        integration-value-link="#"
        doc-link="https://help.retailcrm.es"
    >
        <template #asideContent>
            <Menu></Menu>
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
                                {{ $t('connection.form.crm_url') }}
                            </UiText>
                            <UiInput
                                v-model="connection.crmUrl"
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
                                {{ $t('connection.form.api_key') }}
                            </UiText>
                            <UiInput
                                v-model="connection.apiKey"
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
        name: "Settings",
        components: { Menu },
        data() {
            return {
                error: '',
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
            },
            async save() {
                try {
                    this.loading = true;

                    if (this.connection.crmUrl.slice(-1) === '/') {
                        this.connection.crmUrl = this.connection.crmUrl.slice(0, -1);
                    }

                    await ConnectionApi.save(this.connection);
                } catch (e) {
                    this.error = this.$t('errors.save');
                } finally {
                    this.loading = false;
                }

                await this.get();
            }
        }
    }
</script>

<style scoped>

</style>
