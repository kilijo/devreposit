package com.example.employeemanagement.service;

import com.example.employeemanagement.entity.Employee;
import com.example.employeemanagement.repository.EmployeeRepository;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class EmployeeService {
    private final EmployeeRepository employeeRepository;

     public EmployeeService(EmployeeRepository employeeRepository){
      this.employeeRepository=employeeRepository;
     }

     public List<Employee> getAllEmployee(){
         return employeeRepository.findAll();
     }

     public Optional<Employee> getAllEmployeeById(Long id){
         return  employeeRepository.findById(id);
     }

     public Employee saveEmployee(Employee employee){
         return employeeRepository.save(employee);
     }

     public void deleteEmployee(Long id){

         employeeRepository.deleteById(id);
     }
}
