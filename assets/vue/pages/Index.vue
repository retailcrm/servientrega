<template>
    <div
        id="root"
        style="padding-top: 1px;"
        class="ui-auth-wrap"
    >
        <div class="ui-auth ui-auth_lg">
            <ui-title class="ui-auth__title">
                {{ $t('page.login.title') }}
            </ui-title>

            <div class="ui-auth-box">
                <div
                    class="ui-auth-box__aside ui-auth-box__aside_black"
                >
                    <div class="ui-auth-box__logo">
                        <img src="/build/images/logo.svg">
                    </div>
                    <div class="ui-auth-box__title">
                        {{ $t('connection.title.name') }}
                    </div>
                </div>
                <div class="ui-auth-box__content">
                    <form @submit.prevent="create">
                        <div class="ui-auth-section">
                            <div class="ui-auth-section__title">
                                {{ $t('connection.title.crm') }}
                            </div>
                            <div class="ui-auth-box__row">
                                <ui-text tag="label">
                                    {{ $t('connection.form.crm_url') }}
                                </ui-text>
                                <ui-input
                                    v-model="connection.crmUrl"
                                    required
                                    type="url"
                                    :placeholder="this.$t('connection.form.crm_url')"
                                />
                            </div>
                            <div class="ui-auth-box__row">
                                <ui-text tag="label">
                                    {{ $t('connection.form.api_key') }}
                                </ui-text>
                                <ui-input
                                    v-model="connection.apiKey"
                                    required
                                    type="text"
                                    :placeholder="this.$t('connection.form.api_key')"
                                />
                            </div>
                        </div>

                        <div class="ui-auth-box__row ui-auth-box__row_btn ui-auth-box__row_center">
                            <ui-button
                                :disabled="loading"
                                :state="loading ? 'loading' : 'default'"
                                :form-type="'submit'"
                                size="sm"
                            >
                                {{ $t('button.create') }}
                            </ui-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                connection: {
                    crmUrl: '',
                    apiKey: ''
                }
            }
        },
        methods: {
            async create() {
                try {
                    this.loading = true;

                    if (this.connection.crmUrl.slice(-1) === '/') {
                        this.connection.crmUrl = this.connection.crmUrl.slice(0, -1);
                    }

                    await ConnectionApi.create(this.connection);
                    await this.$router.push('settings/connection');
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
