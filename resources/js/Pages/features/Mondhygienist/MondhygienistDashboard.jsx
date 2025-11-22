import React from 'react'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

const MondhygienistDashboard = (props) => {
    return (
        <AuthenticatedLayout
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">{props.title} Dashboard</h2>}
        >
            <Head title={props.title + ' Dashboard'} />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            Welcome to the {props.title} dashboard!
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    )
}

export default MondhygienistDashboard;