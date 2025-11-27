import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import React from 'react'


const RoleManagementDashboard = (props) => {
  return (
    <AuthenticatedLayout
      header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">{props.title} Dashboard</h2>}
    >
    </AuthenticatedLayout>
  )
}

export default RoleManagementDashboard;