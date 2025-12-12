import React, { useState } from "react";
import { Table, TableHeader, TableHead, TableBody, TableRow, TableCell } from "@/components/ui/table";
import { Button } from "@/components/ui/button";
import { router } from '@inertiajs/react';
import toast, { Toaster } from 'react-hot-toast';
import DialogHandeling from "./DialogHadeling";

const OverView = ({ users }) => {
  const safeUsers = Array.isArray(users) ? users : [];
  const [showDialog, setShowDialog] = useState(false);
  const [selectedUser, setSelectedUser] = useState(null);

  // Helper for deleting a record
  const handleDelete = (user) => {
    router.delete(route('users.destroy', { id: user.id }), {
      onSuccess: () => toast.success('User deleted successfully!'),
      onError: () => toast.error('Failed to delete user!'),
    });
  }

  // Helper for updating a record
  const handleRoleChange = (userId, data) => {
    router.put(route('users.update', { id: userId }), { role: data }, {
      onSuccess: () => toast.success('Role updated!'),
      onError: () => toast.error('Failed to update role'),
    });
  };

  // Helper to show user details
  const handleShow = (userId) => {
    router.get(route('users.show', { id: userId }));
  }

  return (
    <section className="mx-auto mt-8 max-w-4xl px-4">
      <h2 className="text-gray-700 text-3xl sm:text-4xl font-semibold mb-6 text-center">
        Role Management
      </h2>

      <div className="overflow-x-auto">
        <Toaster />
        <Table className="border-4 border-black rounded-xl w-full min-w-[400px] shadow-[3px_3px_0px_black] mx-auto">
          <TableHeader>
            <TableRow>
              <TableHead className="text-center">Name</TableHead>
              <TableHead className="text-center">Email</TableHead>
              <TableHead className="text-center">Role</TableHead>
              <TableHead className="text-center">Actions</TableHead>
            </TableRow>
          </TableHeader>


          <TableBody>
            {safeUsers.length === 0 ? (
              <TableRow>
                <TableCell colSpan={4} className="text-center text-black font-semibold shadow-sm mt-3">
                  Empty Record
                </TableCell>
              </TableRow>
            ) : (
              safeUsers.map((user, index) => (
                <TableRow key={index} className="hover:bg-yellow-50">
                  <TableCell className="text-center">{user.name}</TableCell>
                  <TableCell className="text-center">{user.email}</TableCell>
                  <TableCell className="text-center">
                    <select
                      value={user.role}
                      onChange={e => handleRoleChange(user.id, e.target.value)}
                      className="border-2 border-black rounded-md p-1"
                    >
                      <option value="patient">Patient</option>
                      <option value="praktijkmanagement">Praktijkmanagement</option>
                      <option value="tandarts">Tandarts</option>
                      <option value="mondhygienist">Mondhygienist</option>
                      <option value="assistent">Assistent</option>

                    </select>
                  </TableCell>
                  <TableCell className="flex justify-center gap-2">
                    <Button
                      onClick={() => handleEdit(user)}
                      className="px-2 py-1 text-black border-2 border-black bg-white shadow-[2px_2px_0px_black] hover:bg-gray-100">
                      Edit
                    </Button>
                    <Button
                      onClick={() => handleShow(user.id)}
                      className="px-2 py-1 text-black border-2 border-black bg-white shadow-[2px_2px_0px_black] hover:bg-gray-100">
                      Show
                    </Button>
                    <Button
                      onClick={() => {
                        setSelectedUser(user);
                        setShowDialog(true);
                      }}
                      className="px-2 py-1 text-black border-2 border-black bg-white shadow-[2px_2px_0px_black] hover:bg-gray-100">
                      Delete
                    </Button>
                  </TableCell>
                </TableRow>
              ))
            )}
          </TableBody>
        </Table>
      </div>
      {showDialog && (
        <DialogHandeling
          onConfirm={() => {
            // Call your delete logic here, e.g.:
            router.delete(route('users.destroy', { id: selectedUser.id }));
            setShowDialog(false);
          }}
          onCancel={() => setShowDialog(false)}
        />
      )}
    </section>
  );
};

export default OverView;
