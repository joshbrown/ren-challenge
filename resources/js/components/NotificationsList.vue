<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Notifications</div>

                    <div class="card-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action" v-for="notification in notifications.data" :key="notification.id">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ determineNotificationType(notification.type) }}</h5>
                                    <small>{{notification.created_at}}</small>
                                </div>
                                <p class="mb-1" v-html="notification.data.body"></p>
                                <small>{{ notification.data.author }}</small>
                            </a>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <Bootstrap5Pagination
                                :data="notifications"
                                @pagination-change-page="getNotifications"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Bootstrap5Pagination } from "laravel-vue-pagination";

export default {
        components: {
            Bootstrap5Pagination,
        },

        data() {
            return {
                notifications: [],
            }
        },

        async mounted() {
            await this.getNotifications();
        },

        methods: {
            async getNotifications(page = 1) {
                const response = await fetch(`/user/notifications?page=${page}`)
                const json = await response.json();
                this.notifications = json;
            },

            determineNotificationType(type) {
                if (type === 'App\\Notifications\\OrderShippedNotification') {
                    return 'Order Shipped';
                }

                if (type === 'App\\Notifications\\NewMessageNotification') {
                    return 'New Message';
                }
            }
        },
    }
</script>
