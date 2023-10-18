<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Notifications</div>

                    <div class="card-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action" v-for="notification in notifications" :key="notification.id">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Order Shipped</h5>
                                    <small>{{notification.created_at}}</small>
                                </div>
                                <p class="mb-1" v-html="notification.data.body"></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                notifications: [],
            }
        },

        async mounted() {
            const response = await fetch('/user/notifications')
            const json = await response.json();
            this.notifications = json.data;
        }
    }
</script>
