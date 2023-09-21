import { FC, useState } from 'react'

import AppLayout from '@/Layouts/AppLayout';
import CallScreen from '@/Components/CallScreen';
import DialPadScreen from '@/Components/DialPadScreen'

interface PhoneCallProps {
}

const PhoneCall: FC<PhoneCallProps> = ({ }) => {

    const [isCalling, setIsCalling] = useState<boolean>(false);
    const [phoneNumber, setPhoneNumber] = useState<string | undefined>();

    return (
        <AppLayout>
            <div className='flex items-center justify-center h-[90vh]'>
                <div className="mockup-phone">
                    <div className="camera"></div>
                    <div className="display">
                        <div className="artboard artboard-demo phone-1 pt-7 bg-gray-300">
                            <div className='w-full h-full'>
                                {isCalling && phoneNumber ?
                                    <CallScreen setIsCalling={setIsCalling} phoneNumber={phoneNumber} setPhoneNumber={setPhoneNumber} />
                                    : <DialPadScreen setIsCalling={setIsCalling} setPhoneNumber={setPhoneNumber} />}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    )
}

export default PhoneCall