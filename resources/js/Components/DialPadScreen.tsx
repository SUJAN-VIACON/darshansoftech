import { AiOutlineClose } from "react-icons/ai";
import { IoMdCall } from "react-icons/io";
import React from 'react'
import axios from "axios";
import { cn } from '@/lib/utils'
import useDialPadNumber from "./Hooks/useDialPadNumber";

interface DialPadScreenProps extends
    React.HTMLAttributes<HTMLDivElement> {
    setIsCalling: React.Dispatch<React.SetStateAction<boolean>>,
    setPhoneNumber: React.Dispatch<React.SetStateAction<string | undefined>>
}

type callApiResponseType = {
    data: {
        is_calling: boolean,
        phone_number: string
    }
}

const DialPadScreen = React.forwardRef<HTMLDivElement, DialPadScreenProps>(
    ({ setIsCalling, setPhoneNumber, className, ...props }, ref) => {

        const { dialPadNumbers } = useDialPadNumber();
        const [dialedPhoneNumbers, setDialedPhoneNumbers] = React.useState<Array<string>>([]);

        const handleClick = (number: string) => {
            if (dialedPhoneNumbers.length == 10) return;
            setDialedPhoneNumbers((e) => [...e, number])
        }

        const removeNumberFromLast = () => {
            if (!dialedPhoneNumbers.length) return;
            setDialedPhoneNumbers((e) => e.slice(0, -1))
        }

        const call = async () => {
            if (!dialedPhoneNumbers.length) return alert('number is required');

            try {
                const response = (await axios.get(route('api.call', dialedPhoneNumbers.join('')))) as callApiResponseType
                if (response.data.is_calling) {
                    setPhoneNumber(response.data.phone_number)
                    setIsCalling(response.data.is_calling)
                }
            } catch (error: any) {
                alert(error?.response?.data?.message ?? error.message ?? "Internal server error")
            }
        }

        return (
            <div className={cn("flex flex-col justify-end h-full", className)} {...props} ref={ref}>
                <div className="bg-slate-600 flex flex-col gap-5">
                    <div className='h-10 border-b border-gray-400 text-white flex justify-between items-center px-4 py-10'>
                        <div></div>
                        <p className='text-4xl font-bold '>{dialedPhoneNumbers.join('')}</p>
                        {!!dialedPhoneNumbers.length && (
                            <button onClick={() => removeNumberFromLast()}><AiOutlineClose size={25} className=" cursor-pointer" /></button>
                        )}
                    </div>

                    <div className='grid grid-cols-3 gap-2 p-5'>
                        {dialPadNumbers.map((tab) => (
                            <button className="px-10 py-2 rounded-full bg-black text-white flex flex-col items-center justify-center hover:bg-slate-400"
                                onClick={() => handleClick(tab.text)}>
                                <p className='font-bold text-3xl'>{tab.text}</p>
                                {tab.label && <small>{tab.label}</small>}
                            </button>
                        ))}
                    </div>

                    <div className='flex justify-center mb-4'>
                        <button className='bg-green-400 text-white btn rounded-full' onClick={() => call()}>
                            <IoMdCall size={25} /> Call
                        </button>
                    </div>
                </div>
            </div>
        )
    }
)

DialPadScreen.displayName = "DialPadScreen"

export default DialPadScreen;
