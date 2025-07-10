import {
    mdiAccountCircle,
    mdiMonitor,
    mdiGithub,
    mdiLock,
    mdiAlertCircle,
    mdiSquareEditOutline,
    mdiTable,
    mdiViewList,
    mdiTelevisionGuide,
    mdiResponsive,
    mdiPalette,
    mdiReact,
    mdiChartLine,
} from "@mdi/js";

export default [
    {
        to: "/admin/reports1/client-account1",
        icon: mdiChartLine,
        label: "รายงานบัญชีลูกค้า 1",
    },
    {
        to: "/admin/reports2/client-account2",
        icon: mdiChartLine,
        label: "รายงานบัญชีลูกค้า 2 (Kantapong)",
    },
    {
        to: "/dashboard",
        icon: mdiMonitor,
        label: "Dashboard",
    },
    {
        to: "/tables",
        label: "Tables",
        icon: mdiTable,
    },
    {
        to: "/forms",
        label: "Forms",
        icon: mdiSquareEditOutline,
    },
    {
        to: "/ui",
        label: "UI",
        icon: mdiTelevisionGuide,
    },
    {
        to: "/responsive",
        label: "Responsive",
        icon: mdiResponsive,
    },
    {
        to: "/",
        label: "Styles",
        icon: mdiPalette,
    },
    {
        to: "/profile",
        label: "Profile",
        icon: mdiAccountCircle,
    },
    {
        to: "/login",
        label: "Login",
        icon: mdiLock,
    },
    {
        to: "/error",
        label: "Error",
        icon: mdiAlertCircle,
    },
    {
        label: "Dropdown",
        icon: mdiViewList,
        menu: [
            {
                label: "Item One",
            },
            {
                label: "Item Two",
            },
        ],
    },
    {
        to: '/admin',
        icon: 'mdi:view-dashboard',
        label: 'Dashboard'
    },
    {
        label: 'Report',
        icon: 'mdi:chart-line',
        menu: [
            {
                to: '/admin/report/clients',
                label: 'Clients'
            },
            {
                to: '/admin/report/client-account',
                label: 'Client Account'
            },
            {
                to: '/admin/report/client-transaction',
                label: 'Client Transaction'
            },
            {
                to: '/admin/report/client-rebate',
                label: 'Client Rebate'
            },
            {
                to: '/admin/report/client-summary',
                label: 'Client Summary'
            }
        ]
    },
    {
        label: 'XM Report',
        icon: 'mdi:chart-box',
        to: '/admin/xm'
    },
];
