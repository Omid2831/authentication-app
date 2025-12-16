import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import OverView from './components/OverView'
import React from 'react'

const RoleManagementDashboard = (props) => {
  return (
    <AuthenticatedLayout
      header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">{props.title} Dashboard</h2>}
    >
      <OverView users={props.users} className='flex justify-center' />
    </AuthenticatedLayout>
  );
}

export default RoleManagementDashboard;