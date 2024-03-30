import AllTransactions from './components/AllTransactions.vue';
import MakePayment from './components/MakePayment.vue';
import UpdateTransaction from './components/UpdateTransaction.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllTransactions
    },
    {
        name: 'add',
        path: '/add',
        component: MakePayment
    },
    {
        name: 'update',
        path: '/update',
        component: UpdateTransaction
    },
];
