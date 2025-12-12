import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';
import { Button } from '@/components/ui/button';

const UserShow = ({ user }) => {
    const formatDate = (dateString) => {
        return new Date(dateString).toLocaleDateString('nl-NL', {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
    };

    const getRoleDisplayName = (role) => {
        const roleNames = {
            'patient': 'Patient',
            'tandarts': 'Tandarts',
            'mondhygienist': 'Mondhygiënist',
            'assistent': 'Assistent',
            'praktijkmanagement': 'Praktijkmanagement'
        };
        return roleNames[role] || role;
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    User Details
                </h2>
            }
        >
            <Head title={`User: ${user.name}`} />

            <div className="py-12">
                <div className="max-w-3xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg border-4 border-black">
                        <div className="p-6 text-gray-900">
                            <h3 className="text-2xl font-bold mb-6 pb-4 border-b-2 border-black">
                                User Information
                            </h3>

                            <div className="space-y-4">
                                <div className="grid grid-cols-3 gap-4 p-4 hover:bg-gray-50 rounded">
                                    <div className="font-semibold text-gray-700">Name:</div>
                                    <div className="col-span-2">{user.name}</div>
                                </div>

                                <div className="grid grid-cols-3 gap-4 p-4 hover:bg-gray-50 rounded">
                                    <div className="font-semibold text-gray-700">Email:</div>
                                    <div className="col-span-2">{user.email}</div>
                                </div>

                                <div className="grid grid-cols-3 gap-4 p-4 hover:bg-gray-50 rounded">
                                    <div className="font-semibold text-gray-700">Role:</div>
                                    <div className="col-span-2">
                                        <span className="inline-flex items-center px-3 py-1 rounded-md bg-blue-100 text-blue-800 font-medium">
                                            {getRoleDisplayName(user.role)}
                                        </span>
                                    </div>
                                </div>

                                <div className="grid grid-cols-3 gap-4 p-4 hover:bg-gray-50 rounded">
                                    <div className="font-semibold text-gray-700">Created At:</div>
                                    <div className="col-span-2">{formatDate(user.created_at)}</div>
                                </div>

                                <div className="grid grid-cols-3 gap-4 p-4 hover:bg-gray-50 rounded">
                                    <div className="font-semibold text-gray-700">Last Updated:</div>
                                    <div className="col-span-2">{formatDate(user.updated_at)}</div>
                                </div>
                            </div>

                            <div className="mt-8 pt-6 border-t-2 border-gray-200">
                                <Link href={route('rolemanagement.dashboard')}>
                                    <Button className="px-4 py-2 text-black border-2 border-black bg-white shadow-[2px_2px_0px_black] hover:bg-gray-100">
                                        ← Back to Role Management
                                    </Button>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default UserShow;
