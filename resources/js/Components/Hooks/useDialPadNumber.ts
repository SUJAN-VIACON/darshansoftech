
const useDialPadNumber = () => {
    const dialPadNumbers = [
        {
            text: '1',
            label: ""
        },
        {
            text: '2',
            label: "ABC"
        },
        {
            text: '3',
            label: "DEF"
        }
        , {
            text: '4',
            label: "GHI"
        }
        , {
            text: '5',
            label: "JKL"
        },
        {
            text: '6',
            label: "MNO"
        },
        {
            text: '7',
            label: "PQRS"
        },
        {
            text: '8',
            label: "TUV"
        },
        {
            text: '9',
            label: "WXYZ"
        },
        {
            text: '*',
        },
        {
            text: '0',
        },
        {
            text: '#',
        }
    ]

    return { dialPadNumbers };
}

export default useDialPadNumber