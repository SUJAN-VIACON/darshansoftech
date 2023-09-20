import DialPadScreen from '@/Components/DialPadScreen'
import { FC } from 'react'

interface PhoneCallProps {

}

const PhoneCall: FC<PhoneCallProps> = ({ }) => {

    return (
        <div className='flex items-center justify-center h-[100vh]'>
            <div className="mockup-phone">
                <div className="camera"></div>
                <div className="display">
                    <div className="artboard artboard-demo phone-1 justify-end pt-7 bg-white">
                        <DialPadScreen />
                    </div>
                </div>
            </div>
        </div>
    )
}

export default PhoneCall