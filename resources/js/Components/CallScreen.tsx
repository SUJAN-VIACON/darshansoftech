import { MdOutlineCallEnd } from "react-icons/md";
import React from "react"
import { cn } from "@/lib/utils";

interface CallScreenProps extends
    React.HTMLAttributes<HTMLDivElement> {
    setIsCalling: React.Dispatch<React.SetStateAction<boolean>>,
    phoneNumber: string,
    setPhoneNumber: React.Dispatch<React.SetStateAction<string | undefined>>
}

const CallScreen = React.forwardRef<HTMLDivElement, CallScreenProps>(
    ({ setIsCalling, phoneNumber, setPhoneNumber, className, ...props }, ref) => {

        const hangupTheCall = () => {
            setIsCalling(false);
            setPhoneNumber(undefined);
        }

        return (
            <div className={cn(" flex flex-col justify-between h-full items-center py-10", className)} {...props} ref={ref}>
                <div className="flex flex-col items-center gap-2">
                    <div className="relative">
                        <div className="animate-ping bg-blue-300 w-24 h-24 rounded-full" ></div>
                        <div className="w-20 rounded-full absolute z-10 translate-x-[0.6rem] translate-y-[-5.5rem]">
                            <img src="https://github.com/shadcn.png" className="rounded-full" />
                        </div>
                    </div>

                    <div className="flex flex-col items-center">
                        <p>Calling...</p>
                        <p>{phoneNumber}</p>
                    </div>
                </div>
                <div>
                    <button className="btn btn-error rounded-full text-white" onClick={() => hangupTheCall()}>
                        <MdOutlineCallEnd size={35} />
                    </button>
                </div>
            </div>
        )
    })

CallScreen.displayName = "CallScreen"

export default CallScreen