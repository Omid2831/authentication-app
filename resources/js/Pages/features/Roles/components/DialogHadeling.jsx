import { Dialog, DialogContent, DialogHeader, DialogFooter, DialogTitle, DialogDescription } from '@/components/ui/dialog'
import { Button } from '@/components/ui/button';
import { useState } from 'react';

const DialogHandeling = ({ onConfirm, onCancel }) => {
    const [isOpen, setIsOpen] = useState(true);


    //Helper for the Confirmation
    const handleConfirmation = () => {
        setIsOpen(false);
        if (onConfirm) return onConfirm();
    }
    //Helper for the Cancelation
    const handleCancelation = () => {
        setIsOpen(false);
        if (onCancel) return onCancel();
    }

    return (
        <Dialog open={open} onOpenChange={setIsOpen}>
            <DialogContent>
                <DialogHeader>
                    <DialogTitle>Delete User</DialogTitle>
                    <DialogDescription>
                        Are you sure you want to delete this user? This action cannot be undone.
                    </DialogDescription>
                </DialogHeader>
                <DialogFooter>
                    <Button variant="outline" onClick={handleCancelation}>Cancel</Button>
                    <Button variant="destructive" onClick={handleConfirmation}>Delete</Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>
    );
}

export default DialogHandeling;