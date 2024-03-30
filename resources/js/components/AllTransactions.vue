<template>
    <div>
        <h3 class="text-center">All Transactions</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Amount</th>
                <th>Transaction ID</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="record in transactions" :key="record.id">
                <td>{{ record.id }}</td>
                <td>{{ record.user_id }}</td>
                <td>{{ record.amount }}</td>
                <td>{{ record.transaction_id }}</td>
                <td>{{ record.status }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                transactions: []
            }
        },
        created() {
            this.axios
                .get('/api/transactions', {
                        headers: {
                            'X-Mock-Status': 'accepted',
                        }
                    })
                .then(response => {
                    this.transactions = response.data;
                });
        },
        methods: {
            //
        }
    }
</script>
