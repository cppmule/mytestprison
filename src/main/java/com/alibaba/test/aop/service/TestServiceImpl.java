package com.alibaba.test.aop.service;

public class TestServiceImpl implements TestService {

	public void process(String value) {
		System.out.println("====ҵ���������=========");
		System.out.println("'TestServiceImpl.process()'\t����ֵ��" + value);
	}
}
