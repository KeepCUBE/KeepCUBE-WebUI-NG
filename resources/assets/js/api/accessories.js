/**
 * Created by ddos on 13.12.16.
 */
const _accessories = [
    {
        id: 34,
        title: 'Main light in room 1',
        typeId: 10,
        groups: [
            4, //room 1
            2, //lights
        ]
    },
    {
        id: 48,
        title: 'Light above bed in room 1',
        typeId: 10,
        groups: [
            4, //room 1
            2, //lights
        ]
    },
    {
        id: 49,
        title: 'Sunblind in room 1',
        typeId: 14,
        groups: [
            4, //room 1
            6, //sunblinds
        ]
    },
];

export default {
    getAccessories (cb) {
        setTimeout(() => cb(_accessories), 100)
    }
}