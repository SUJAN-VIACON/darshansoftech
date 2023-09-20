import { AiOutlineClose } from "react-icons/ai";
import { IoMdCall } from "react-icons/io";
import React from 'react'
import { cn } from '@/lib/utils'
import useDialPadNumber from "./Hooks/useDialPadNumber";

interface DialPadScreenProps extends
    React.HTMLAttributes<HTMLDivElement> {

}


const DialPadScreen = React.forwardRef<HTMLDivElement, DialPadScreenProps>(
    ({ className, ...props }, ref) => {

        const { dialPadNumbers } = useDialPadNumber();
        const [phoneNumber, setPhoneNumber] = React.useState<Array<string>>([]);

        const handleClick = (number: string) => {
            if (phoneNumber.length == 10) return;
            setPhoneNumber((e) => [...e, number])
        }

        const removeNumberFromLast = () => {
            if (!phoneNumber.length) return;
            setPhoneNumber((e) => e.slice(0, -1))
        }

        return (
            <div className={cn(" bg-slate-600 flex flex-col gap-5", className)} {...props} ref={ref}>
                <div className='h-10 border-b border-gray-400 text-white flex justify-between items-center px-4 py-10'>
                    <div></div>
                    <p className='text-4xl font-bold '>{phoneNumber.join('')}</p>
                    {!!phoneNumber.length && (
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
                    <button className='bg-green-400 text-white btn rounded-full'><IoMdCall size={25} />Call</button>
                </div>
            </div>
        )
    }
)

DialPadScreen.displayName = "DialPadScreen"

export default DialPadScreen;
