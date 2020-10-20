<template>
    <div>
        <ui-menu-btn
            icon="settingsOutlined"
            :active="current === 'connection'"
            @click="navigate('connection')"
        >
            {{ $t('connection.title.crm') }}
        </ui-menu-btn>
        <ui-menu-btn
            icon="shopOutlined"
            :active="current === 'account'"
            @click="navigate('account')"
        >
            {{ $t('connection.title.name') }}
        </ui-menu-btn>
    </div>
</template>

<script>
    export default {
        name: "Menu",
        props: {
            current: {
                type: String,
                default: () => 'connection'
            }
        },
        methods: {
            navigate(route) {
                if (this.current !== route) {
                    this.$router.push(route);
                }
            }
        }
    }
</script>

<style scoped>

</style>
